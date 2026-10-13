<?php

return [
    'year' => 2026,
    'notification_email' => env('QUALITY_RECOGNITION_NOTIFICATION_EMAIL'),
    // Set this to the final Blade view name once the certificate design is supplied.
    'certificate_view' => env('QUALITY_RECOGNITION_CERTIFICATE_VIEW'),
    'questions' => [
        'quality_meaning' => ['label' => 'What does quality mean to your company or organization?', 'hint' => 'A few honest lines is perfect.', 'placeholder' => 'In our company, quality means…'],
        'mission_vision' => ['label' => 'Share your mission and vision — and what they mean to your team in everyday work.', 'hint' => 'No need to quote them perfectly. Tell us how they show up day to day.', 'placeholder' => 'Our mission and vision are… and in daily work they show up as…'],
        'quality_policy' => ['label' => 'What is your quality policy, and the story behind how it came to be?', 'hint' => 'The story matters as much as the wording.', 'placeholder' => 'Our quality policy is… It came about when…'],
        'team_engagement' => ['label' => 'Everyone has their own way of keeping the team connected to quality goals. What works well for you?', 'hint' => 'For example: briefings, boards, training, awards, toolbox talks — whatever fits your people.', 'placeholder' => 'What works well for us is…'],
        'improvement' => ['label' => "One improvement or innovation in your quality system, from the last few years, that you're proud of?", 'hint' => 'Big or small — both are welcome, and both count.', 'placeholder' => "The change we're proud of is…"],
        'improvement_impact' => ['label' => 'What changed for the better because of it?', 'hint' => 'Fewer errors, faster delivery, happier clients, cost saved, safer work — whatever you saw.', 'placeholder' => 'After it, we noticed…'],
        'future_goal' => ['label' => "One quality goal you're excited about going forward?", 'hint' => "Where you're headed next.", 'placeholder' => "Next, we're excited to…"],
    ],
    'evidence_options' => ['Before / after numbers', 'Photos', 'Updated procedure / SOP', 'Audit report', 'Certificate', 'Client feedback', 'Cost savings', 'Training records'],
    'company_fields' => [
        'company_name' => ['label' => 'Company / organization name', 'placeholder' => 'Your company', 'required' => true],
        'country' => ['label' => 'Country', 'placeholder' => 'e.g. Kuwait', 'required' => true],
        'region' => ['label' => 'State / province / region', 'placeholder' => 'e.g. Al Asimah', 'required' => true],
        'industry' => ['label' => 'Sector / industry', 'placeholder' => 'e.g. Construction', 'required' => true],
        'company_size' => ['label' => 'Company size', 'placeholder' => 'e.g. 120 employees', 'required' => false],
        'years_in_operation' => ['label' => 'Years in operation', 'placeholder' => 'e.g. 15', 'required' => false],
        'certifications' => ['label' => 'ISO / certifications', 'placeholder' => 'e.g. ISO 9001', 'required' => false],
        'contact_name' => ['label' => 'Contact person', 'placeholder' => 'Name', 'required' => true],
        'designation' => ['label' => 'Designation', 'placeholder' => 'Role', 'required' => true],
        'email' => ['label' => 'Contact email', 'placeholder' => 'you@company.com', 'required' => true],
        'phone' => ['label' => 'Contact phone', 'placeholder' => 'Include country code', 'required' => false],
    ],
];
