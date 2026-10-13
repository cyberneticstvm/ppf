<?php

namespace App\Services;

use App\Models\QualityRecognitionSubmission;
use Barryvdh\DomPDF\Facade\Pdf;

class QualityRecognitionAnswersPdf
{
    public function render(QualityRecognitionSubmission $submission): string
    {
        return Pdf::loadView('quality-recognition.answers-pdf', compact('submission'))
            ->setOption('isFontSubsettingEnabled', true)
            ->setPaper('a4', 'portrait')
            ->output();
    }
}
