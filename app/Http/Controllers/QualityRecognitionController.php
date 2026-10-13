<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQualityRecognitionRequest;
use App\Models\QualityRecognitionSubmission;
use App\Services\QualityRecognitionNotifications;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class QualityRecognitionController extends Controller
{
    public function create()
    {
        $title = 'Quality Excellence Recognition — PPF Kuwait';

        return view('quality-recognition.create', compact('title'));
    }

    public function store(StoreQualityRecognitionRequest $request, QualityRecognitionNotifications $notifications)
    {
        $data = $request->safe()->except('rules_accepted');
        $data['award_year'] = config('quality_recognition.year');
        $data['organization_key'] = QualityRecognitionSubmission::organizationKey($data['company_name'], $data['country'], $data['award_year']);
        $data['public_id'] = (string) Str::uuid();
        $data['reference'] = 'QER-'.$data['award_year'].'-'.Str::upper(Str::random(12));
        $data['follow_up_consent'] = $request->boolean('follow_up_consent');
        $data['sharing_consent'] = $request->boolean('sharing_consent');
        try {
            $submission = QualityRecognitionSubmission::create($data);
        } catch (QueryException $exception) {
            // The unique database key also protects simultaneous duplicate requests.
            if (QualityRecognitionSubmission::withTrashed()->where('organization_key', $data['organization_key'])->exists()) {
                throw ValidationException::withMessages(['company_name' => 'An entry for this company and country has already been submitted for this award year.']);
            }
            throw $exception;
        }
        $notifications->sendPending($submission);

        return redirect()->route('quality-recognition.thanks')->with('recognition_reference', $submission->reference);
    }

    public function thanks()
    {
        if (! session()->has('recognition_reference')) {
            return redirect()->route('quality-recognition.create');
        }

        return view('quality-recognition.thanks', ['title' => 'Entry received — PPF Kuwait', 'reference' => session('recognition_reference')]);
    }
}
