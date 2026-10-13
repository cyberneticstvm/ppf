<?php

namespace App\Http\Controllers;

use App\Models\QualityRecognitionSubmission;
use App\Services\QualityRecognitionNotifications;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminQualityRecognitionController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            abort_unless($request->user()?->type === 'admin', 403);

            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $filters = $request->validate(['status' => ['nullable', Rule::in(['pending', 'approved', 'rejected'])], 'search' => 'nullable|string|max:255']);
        $submissions = QualityRecognitionSubmission::query()
            ->when($filters['status'] ?? null, fn ($query, $status) => $query->where('status', $status))
            ->when($filters['search'] ?? null, fn ($query, $search) => $query->where(function ($query) use ($search) {
                $query->where('company_name', 'like', '%'.$search.'%')->orWhere('reference', 'like', '%'.$search.'%');
            }))->latest()->paginate(25)->withQueryString();

        return view('admin.quality-recognition.index', compact('submissions'));
    }

    public function show(QualityRecognitionSubmission $submission)
    {
        return view('admin.quality-recognition.show', compact('submission'));
    }

    public function update(Request $request, QualityRecognitionSubmission $submission)
    {
        $data = $request->validate(['status' => ['required', Rule::in(['pending', 'approved', 'rejected'])], 'review_notes' => 'nullable|string|max:5000']);
        $submission->update($data + ['reviewed_by' => $request->user()->id, 'reviewed_at' => now()]);

        return back()->with('success', 'Submission review saved successfully.');
    }

    public function retryEmails(QualityRecognitionSubmission $submission, QualityRecognitionNotifications $notifications)
    {
        $notifications->sendPending($submission);
        $delivered = $submission->acknowledgement_sent_at && $submission->notification_sent_at;

        return back()->with($delivered ? 'success' : 'error', $delivered ? 'Both submission emails have been sent.' : 'Some emails are still pending. Check the recipient configuration and mail service, then retry.');
    }
}
