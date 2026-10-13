<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QualityRecognitionSubmission extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'evidence_types' => 'array',
        'follow_up_consent' => 'boolean',
        'sharing_consent' => 'boolean',
        'reviewed_at' => 'datetime',
        'acknowledgement_sent_at' => 'datetime',
        'notification_sent_at' => 'datetime',
    ];

    public static function organizationKey(string $company, string $country, int $year): string
    {
        $normalize = fn ($value) => mb_strtolower(preg_replace('/\s+/u', ' ', trim($value)));

        return hash('sha256', $year.'|'.$normalize($country).'|'.$normalize($company));
    }
}
