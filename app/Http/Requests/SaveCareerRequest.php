<?php

namespace App\Http\Requests;

use App\Models\Career;
use App\Services\CareerDescription;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveCareerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->type === 'admin';
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:100000',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'application_url' => 'nullable|url:http,https|max:2000',
            'closing_date' => 'nullable|date_format:Y-m-d',
            'status' => ['required', Rule::in(['published', 'draft'])],
            'remove_poster' => 'sometimes|boolean',
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->isNotEmpty()) {
                return;
            }
            $description = app(CareerDescription::class)->clean($this->input('description', '') ?? '');
            $career = $this->route('career');
            $hasPoster = $this->hasFile('poster') || ($career instanceof Career && $career->poster_path && ! $this->boolean('remove_poster'));
            if (! app(CareerDescription::class)->hasText($description) && ! $hasPoster) {
                $validator->errors()->add('description', 'Write a job description or upload a job poster image.');
            }
        });
    }
}
