<?php

namespace App\Services;

use App\Mail\QualityRecognitionMail;
use App\Models\QualityRecognitionSubmission;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use RuntimeException;
use Throwable;

class QualityRecognitionNotifications
{
    public function sendPending(QualityRecognitionSubmission $submission): void
    {
        // Save first. A mail transport failure must never lose the applicant's entry.
        foreach (['acknowledgement_sent_at', 'notification_sent_at'] as $field) {
            if ($submission->$field) {
                continue;
            }
            try {
                $forAdmin = $field === 'notification_sent_at';
                $recipient = $forAdmin ? config('quality_recognition.notification_email') : $submission->email;
                if (! $recipient) {
                    throw new RuntimeException('Recognition notification recipient is not configured.');
                }
                Mail::to($recipient)->send(new QualityRecognitionMail($submission, $forAdmin));
                $submission->forceFill([$field => now()])->save();
            } catch (Throwable $exception) {
                Log::warning('Quality recognition email delivery failed.', [
                    'submission_id' => $submission->id,
                    'email_type' => $field,
                    'exception_type' => get_class($exception),
                ]);
            }
        }
    }
}
