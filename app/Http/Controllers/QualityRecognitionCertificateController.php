<?php

namespace App\Http\Controllers;

use App\Models\QualityRecognitionSubmission;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class QualityRecognitionCertificateController extends Controller
{
    public function download(Request $request, QualityRecognitionSubmission $submission)
    {
        abort_unless($request->user()?->type === 'admin', 403);
        abort_unless($submission->status === 'approved', 403, 'This submission has not been approved.');
        $template = config('quality_recognition.certificate_view');
        if (! $template || ! View::exists($template)) {
            return back()->with('error', 'The final certificate design has not been configured yet.');
        }

        return Pdf::loadView($template, compact('submission'))
            ->setPaper('a4', 'landscape')
            ->download('quality-recognition-'.$submission->reference.'.pdf');
    }
}
