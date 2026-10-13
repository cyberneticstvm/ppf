<?php

namespace App\Http\Requests;

use App\Models\QualityRecognitionSubmission;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreQualityRecognitionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'company_name' => 'required|string|max:255',
            'country' => 'required|string|max:100',
            'region' => 'required|string|max:150',
            'industry' => 'required|string|max:150',
            'company_size' => 'nullable|string|max:100',
            'years_in_operation' => 'nullable|string|max:50',
            'certifications' => 'nullable|string|max:255',
            'contact_name' => 'required|string|max:150',
            'designation' => 'required|string|max:150',
            'email' => 'required|email:rfc|max:255',
            'phone' => 'nullable|string|max:50',
            'evidence_types' => 'nullable|array|max:8',
            'evidence_types.*' => ['string', 'distinct', Rule::in(config('quality_recognition.evidence_options'))],
            'impact_metric' => 'nullable|string|max:255',
            'showcase' => 'nullable|string|max:10000',
            'follow_up_consent' => 'sometimes|boolean',
            'sharing_consent' => 'sometimes|boolean',
            'rules_accepted' => 'required|accepted',
        ];
        foreach (array_keys(config('quality_recognition.questions')) as $field) {
            $rules[$field] = 'required|string|max:10000';
        }

        return $rules;
    }

    public function attributes(): array
    {
        return collect(config('quality_recognition.company_fields'))->mapWithKeys(fn ($details, $field) => [$field => $details['label']])->all()
            + ['rules_accepted' => 'rules and judging acknowledgement'];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->isNotEmpty()) {
                return;
            }
            $key = QualityRecognitionSubmission::organizationKey($this->company_name, $this->country, config('quality_recognition.year'));
            if (QualityRecognitionSubmission::where('organization_key', $key)->exists()) {
                $validator->errors()->add('company_name', 'An entry for this company and country has already been submitted for this award year. Please contact PPF if you need to update it.');
            }
        });
    }
}
