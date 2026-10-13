<?php

namespace App\Mail;

use App\Models\QualityRecognitionSubmission;
use App\Services\QualityRecognitionAnswersPdf;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QualityRecognitionMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public QualityRecognitionSubmission $submission, public bool $forAdmin = false)
    {
    }

    public function build()
    {
        $this->subject(($this->forAdmin ? 'New Quality Excellence Recognition entry — ' : 'We received your Quality Excellence Recognition entry — ').$this->submission->reference)
            ->view('quality-recognition.email');

        if ($this->forAdmin) {
            $this->replyTo($this->submission->email, $this->submission->contact_name);
        } else {
            $this->attachData(
                app(QualityRecognitionAnswersPdf::class)->render($this->submission),
                'quality-recognition-answers-'.$this->submission->reference.'.pdf',
                ['mime' => 'application/pdf']
            );
        }

        return $this;
    }
}
