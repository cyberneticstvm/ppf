<?php

namespace Tests\Feature;

use App\Mail\QualityRecognitionMail;
use App\Models\QualityRecognitionSubmission;
use App\Models\User;
use App\Services\QualityRecognitionAnswersPdf;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Mail\MailManager;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Mockery;
use Tests\TestCase;

class QualityRecognitionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // Override cached application configuration too; never use the site's database or mail service.
        config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:', 'mail.default' => 'array', 'session.driver' => 'array', 'cache.default' => 'array', 'quality_recognition.notification_email' => 'panel@example.test', 'quality_recognition.certificate_view' => null]);
        DB::purge('sqlite');
        Schema::create('logos', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('alt_text')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
        });
        DB::table('logos')->insert(['id' => 1, 'logo' => '/backend/assets/images/logo/logo-ppf.png', 'alt_text' => 'PPF Kuwait', 'mobile' => '+96500000000', 'email' => 'ppf@example.test']);
        Schema::create('scrolling_messages', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('message')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        (require database_path('migrations/2026_10_10_000001_create_quality_recognition_submissions_table.php'))->up();
        (require database_path('migrations/2026_10_13_000002_add_soft_deletes_to_quality_recognition_submissions.php'))->up();
        (require database_path('migrations/2026_10_14_000001_add_evidence_files_to_quality_recognition_submissions.php'))->up();
        Storage::fake('local');
        Mail::fake();
    }

    protected function payload(): array
    {
        return [
            'company_name' => 'Example Quality Company', 'country' => 'Kuwait', 'region' => 'Al Asimah', 'industry' => 'Construction',
            'company_size' => '120 employees', 'years_in_operation' => '15', 'certifications' => 'ISO 9001',
            'contact_name' => 'Test Applicant', 'designation' => 'Quality Manager', 'email' => 'applicant@example.test', 'phone' => '+96512345678',
            'quality_meaning' => 'Consistent outcomes.', 'mission_vision' => 'Quality in everyday work.', 'quality_policy' => 'Continuous improvement.',
            'team_engagement' => 'Weekly briefings.', 'improvement' => 'New review process.', 'improvement_impact' => 'Reduced rework.', 'future_goal' => 'Faster delivery.',
            'evidence_types' => ['Photos', 'Training records'], 'impact_metric' => 'Rework down 8% to 2%', 'showcase' => 'A new inspection process.',
            'follow_up_consent' => '1', 'sharing_consent' => '0', 'rules_accepted' => '1',
        ];
    }

    protected function submit(): QualityRecognitionSubmission
    {
        $this->post(route('quality-recognition.store'), $this->payload())->assertRedirect(route('quality-recognition.thanks'));

        return QualityRecognitionSubmission::firstOrFail();
    }

    protected function admin(): User
    {
        $admin = new User(['name' => 'Reviewer', 'type' => 'admin']);
        $admin->id = 42;

        return $admin;
    }

    public function test_form_uses_the_existing_layout_and_reference_questions(): void
    {
        $this->get(route('quality-recognition.create'))->assertOk()->assertSee('Quality Excellence Recognition')->assertSee('Your Quality Foundation')->assertSee('Innovation &amp; Improvement', false)->assertSee('quality-recognition.css')->assertSee('quality-recognition.js')->assertSee('enctype="multipart/form-data"', false)->assertSee('name="evidence_files[]" id="evidence_files" multiple', false);
    }

    public function test_submission_is_saved_and_both_emails_are_sent(): void
    {
        $submission = $this->submit();
        $this->assertSame('pending', $submission->status);
        $this->assertSame(['Photos', 'Training records'], $submission->evidence_types);
        $this->assertTrue($submission->follow_up_consent);
        $this->assertFalse($submission->sharing_consent);
        $this->assertNotNull($submission->acknowledgement_sent_at);
        $this->assertNotNull($submission->notification_sent_at);
        Mail::assertSent(QualityRecognitionMail::class, fn ($mail) => ! $mail->forAdmin && $mail->hasTo('applicant@example.test'));
        Mail::assertSent(QualityRecognitionMail::class, fn ($mail) => $mail->forAdmin && $mail->hasTo('panel@example.test'));
        $this->get(route('quality-recognition.thanks'))->assertOk()->assertSee($submission->reference);
    }

    public function test_delivered_acknowledgement_contains_a_pdf_answers_attachment(): void
    {
        // Use Laravel's in-memory transport to exercise actual MIME assembly and PDF rendering.
        Mail::swap(new MailManager($this->app));
        $this->post(route('quality-recognition.store'), $this->payload() + [
            'evidence_files' => [UploadedFile::fake()->create('evidence.pdf', 10, 'application/pdf')],
        ])->assertRedirect(route('quality-recognition.thanks'));
        $submission = QualityRecognitionSubmission::firstOrFail();
        $messages = Mail::mailer('array')->getSymfonyTransport()->messages();
        $this->assertCount(2, $messages);
        $acknowledgement = $messages->first()->getOriginalMessage();
        $this->assertSame('applicant@example.test', $acknowledgement->getTo()[0]->getAddress());
        $this->assertStringContainsString('PDF copy of your submitted answers is attached', $acknowledgement->getHtmlBody());
        $attachments = $acknowledgement->getAttachments();
        $this->assertCount(1, $attachments);
        $this->assertSame('quality-recognition-answers-'.$submission->reference.'.pdf', $attachments[0]->getFilename());
        $this->assertSame('application', $attachments[0]->getMediaType());
        $this->assertSame('pdf', $attachments[0]->getMediaSubtype());
        $this->assertStringStartsWith('%PDF-', $attachments[0]->getBody());
        $this->assertCount(0, $messages->last()->getOriginalMessage()->getAttachments());
        $this->assertNotNull($submission->acknowledgement_sent_at);
    }

    public function test_pdf_failure_keeps_submission_and_retry_sends_acknowledgement_with_attachment(): void
    {
        Mail::swap(new MailManager($this->app));
        $pdf = Mockery::mock(QualityRecognitionAnswersPdf::class);
        $pdf->shouldReceive('render')->once()->andThrow(new \RuntimeException('PDF renderer unavailable'));
        $this->app->instance(QualityRecognitionAnswersPdf::class, $pdf);
        $submission = $this->submit();
        $this->assertSame(1, QualityRecognitionSubmission::count());
        $this->assertNull($submission->acknowledgement_sent_at);
        $this->assertNotNull($submission->notification_sent_at);
        $this->assertCount(1, Mail::mailer('array')->getSymfonyTransport()->messages());

        $this->app->instance(QualityRecognitionAnswersPdf::class, new QualityRecognitionAnswersPdf);
        $this->actingAs($this->admin())->post(route('admin.quality-recognition.retry-emails', $submission))->assertSessionHas('success');
        $this->assertNotNull($submission->fresh()->acknowledgement_sent_at);
        $messages = Mail::mailer('array')->getSymfonyTransport()->messages();
        $this->assertCount(2, $messages);
        $this->assertStringStartsWith('%PDF-', $messages->last()->getOriginalMessage()->getAttachments()[0]->getBody());
        $this->post(route('admin.quality-recognition.retry-emails', $submission))->assertSessionHas('success');
        $this->assertCount(2, Mail::mailer('array')->getSymfonyTransport()->messages());
    }

    public function test_answers_document_contains_all_submitted_fields_and_excludes_review_notes(): void
    {
        $submission = $this->submit();
        $submission->update(['review_notes' => 'Private panel discussion', 'years_in_operation' => '0']);
        $html = view('quality-recognition.answers-pdf', compact('submission'))->render();
        foreach (array_keys(config('quality_recognition.questions')) as $field) {
            $this->assertStringContainsString(e($submission->$field), $html);
        }
        foreach (array_keys(config('quality_recognition.company_fields')) as $field) {
            $this->assertStringContainsString(e($submission->$field), $html);
        }
        foreach ($submission->evidence_types as $evidence) {
            $this->assertStringContainsString($evidence, $html);
        }
        $this->assertStringContainsString(e($submission->impact_metric), $html);
        $this->assertStringContainsString(e($submission->showcase), $html);
        $this->assertStringNotContainsString('Private panel discussion', $html);
        $submission->update(['quality_meaning' => '<script>alert(1)</script>']);
        $html = view('quality-recognition.answers-pdf', compact('submission'))->render();
        $this->assertStringContainsString('&lt;script&gt;', $html);
        $this->assertStringNotContainsString('<script>', $html);
    }

    public function test_injected_approval_and_delivery_fields_are_ignored(): void
    {
        $payload = $this->payload() + ['status' => 'approved', 'reviewed_by' => 1, 'notification_sent_at' => '2026-10-01'];
        $this->post(route('quality-recognition.store'), $payload)->assertRedirect();
        $submission = QualityRecognitionSubmission::firstOrFail();
        $this->assertSame('pending', $submission->status);
        $this->assertNull($submission->reviewed_by);
    }

    public function test_invalid_entry_does_not_save_or_send_mail(): void
    {
        $payload = $this->payload();
        $payload['email'] = 'invalid';
        $payload['quality_policy'] = '';
        $payload['rules_accepted'] = '0';
        $payload['evidence_types'] = ['Unexpected option'];
        $this->post(route('quality-recognition.store'), $payload)->assertSessionHasErrors(['email', 'quality_policy', 'rules_accepted', 'evidence_types.0']);
        $this->assertSame(0, QualityRecognitionSubmission::count());
        Mail::assertNothingSent();
    }

    public function test_normalized_duplicate_company_entry_is_rejected(): void
    {
        $this->submit();
        $payload = $this->payload();
        $payload['company_name'] = ' EXAMPLE   QUALITY COMPANY ';
        $payload['country'] = 'KUWAIT';
        $this->post(route('quality-recognition.store'), $payload)->assertSessionHasErrors('company_name');
        $this->assertSame(1, QualityRecognitionSubmission::count());
        Mail::assertSentCount(2);
    }

    public function test_missing_recipient_keeps_entry_and_can_be_retried(): void
    {
        config(['quality_recognition.notification_email' => null]);
        $submission = $this->submit();
        $this->assertNotNull($submission->acknowledgement_sent_at);
        $this->assertNull($submission->notification_sent_at);
        config(['quality_recognition.notification_email' => 'panel@example.test']);
        $this->actingAs($this->admin())->post(route('admin.quality-recognition.retry-emails', $submission))->assertSessionHas('success');
        $this->assertNotNull($submission->fresh()->notification_sent_at);
        Mail::assertSentCount(2);
        $this->post(route('admin.quality-recognition.retry-emails', $submission))->assertSessionHas('success');
        Mail::assertSentCount(2);
    }

    public function test_transport_failure_does_not_lose_submission_or_acknowledgement(): void
    {
        $mailer = Mockery::mock();
        $mailer->shouldReceive('send')->once()->andThrow(new \RuntimeException('Transport unavailable'));
        Mail::shouldReceive('to')->with('applicant@example.test')->once()->andReturn($mailer);
        $adminMailer = Mockery::mock();
        $adminMailer->shouldReceive('send')->once();
        Mail::shouldReceive('to')->with('panel@example.test')->once()->andReturn($adminMailer);
        $submission = $this->submit();
        $this->assertNull($submission->acknowledgement_sent_at);
        $this->assertNotNull($submission->notification_sent_at);
    }

    public function test_guests_members_and_editors_cannot_review_private_entries(): void
    {
        $submission = $this->submit();
        $this->get(route('admin.quality-recognition.show', $submission))->assertRedirect(route('login'));
        foreach (['primary', 'editor'] as $type) {
            $user = new User(['type' => $type]);
            $user->id = 9;
            $this->actingAs($user)->get(route('admin.quality-recognition.show', $submission))->assertStatus($type === 'editor' ? 403 : 302);
            $this->actingAs($user)->post(route('admin.quality-recognition.update', $submission), ['status' => 'approved'])->assertStatus($type === 'editor' ? 403 : 302);
        }
        $this->assertSame('pending', $submission->fresh()->status);
    }

    public function test_admin_can_view_filter_and_approve_submissions(): void
    {
        $submission = $this->submit();
        $this->actingAs($this->admin())->get(route('admin.quality-recognition.index', ['status' => 'pending', 'search' => 'Example']))->assertOk()->assertSee($submission->reference);
        $this->get(route('admin.quality-recognition.show', $submission))->assertOk()->assertSee('Weekly briefings.');
        $this->post(route('admin.quality-recognition.update', $submission), ['status' => 'approved', 'review_notes' => 'Panel approved'])->assertSessionHas('success');
        $submission->refresh();
        $this->assertSame('approved', $submission->status);
        $this->assertSame(42, $submission->reviewed_by);
        $this->assertNotNull($submission->reviewed_at);
        Mail::assertSentCount(2); // Approval does not automatically send a certificate or another email.
        $this->get(route('admin.quality-recognition.index', ['status' => 'pending']))->assertOk()->assertDontSee($submission->reference);
    }

    public function test_certificate_requires_approval_and_final_design(): void
    {
        $submission = $this->submit();
        $this->actingAs($this->admin())->get(route('admin.quality-recognition.certificate', $submission))->assertForbidden();
        $submission->update(['status' => 'approved']);
        $this->get(route('admin.quality-recognition.certificate', $submission))->assertSessionHas('error');
        $this->get(route('admin.quality-recognition.show', $submission))->assertOk()->assertSee('once the final design is configured');
    }

    public function test_approved_certificate_renders_pdf_when_template_is_configured(): void
    {
        $submission = $this->submit();
        $submission->update(['status' => 'approved']);
        // A test-only layout exercises DomPDF without inventing a production certificate design.
        View::addNamespace('recognition-test', base_path('tests/Fixtures'));
        config(['quality_recognition.certificate_view' => 'recognition-test::certificate']);
        $response = $this->actingAs($this->admin())->get(route('admin.quality-recognition.certificate', $submission));
        $response->assertOk()->assertHeader('content-type', 'application/pdf');
        $this->assertStringStartsWith('%PDF-', $response->getContent());
        $submission->update(['status' => 'rejected']);
        $this->get(route('admin.quality-recognition.certificate', $submission))->assertForbidden();
    }

    public function test_emails_escape_applicant_content(): void
    {
        $submission = $this->submit();
        $submission->update(['company_name' => '<script>alert(1)</script>']);
        $html = (new QualityRecognitionMail($submission, true))->render();
        $this->assertStringContainsString('&lt;script&gt;', $html);
        $this->assertStringNotContainsString('<script>', $html);
    }

    public function test_thank_you_page_does_not_expose_entries_without_session(): void
    {
        $this->get(route('quality-recognition.thanks'))->assertRedirect(route('quality-recognition.create'));
    }

    public function test_admin_can_soft_delete_recognition_and_removed_record_keeps_duplicate_protection(): void
    {
        $submission = $this->submit();
        $this->actingAs($this->admin())->delete(route('admin.quality-recognition.destroy', $submission))->assertRedirect(route('admin.quality-recognition.index'));
        $this->assertSoftDeleted('quality_recognition_submissions', ['id' => $submission->id]);
        $this->get(route('admin.quality-recognition.index'))->assertOk()->assertDontSee($submission->reference);
        $this->post(route('quality-recognition.store'), $this->payload())->assertSessionHasErrors('company_name');
        Mail::assertSentCount(2);
    }

    public function test_editors_cannot_delete_recognition_submissions(): void
    {
        $submission = $this->submit();
        $editor = new User(['type' => 'editor']);
        $editor->id = 9;
        $this->actingAs($editor)->delete(route('admin.quality-recognition.destroy', $submission))->assertForbidden();
        $this->assertNull($submission->fresh()->deleted_at);
    }

    public function test_recognition_admin_list_supplies_all_rows_to_shared_datatable(): void
    {
        $submission = $this->submit();
        for ($i = 1; $i <= 26; $i++) {
            $copy = $submission->replicate();
            $copy->forceFill(['public_id' => (string) \Illuminate\Support\Str::uuid(), 'reference' => 'QER-TABLE-'.$i, 'organization_key' => hash('sha256', 'table-'.$i)])->save();
        }
        $response = $this->actingAs($this->admin())->get(route('admin.quality-recognition.index'));
        $response->assertOk()->assertSee('id="basic-1"', false)->assertSee('display table table-sm table-striped')->assertSee('Delete submission');
        $this->assertCount(27, $response->viewData('submissions'));
    }

    public function test_multiple_evidence_files_are_stored_privately_and_downloadable_only_by_admin(): void
    {
        $this->post(route('quality-recognition.store'), $this->payload() + ['evidence_files' => [
            UploadedFile::fake()->create('Results.pdf', 12, 'application/pdf'),
            UploadedFile::fake()->image('Team.png'),
        ]])->assertRedirect(route('quality-recognition.thanks'));
        $submission = QualityRecognitionSubmission::firstOrFail();
        $this->assertCount(2, $submission->evidence_files);
        foreach ($submission->evidence_files as $file) {
            Storage::disk('local')->assertExists($file['path']);
            $this->assertStringStartsWith('quality-recognition/'.$submission->public_id.'/', $file['path']);
            $this->assertGreaterThan(0, $file['size']);
        }
        $file = $submission->evidence_files[0];
        $url = route('admin.quality-recognition.evidence', [$submission, $file['id']]);
        $this->get($url)->assertRedirect(route('login'));
        $editor = new User(['type' => 'editor']);
        $editor->id = 9;
        $this->actingAs($editor)->get($url)->assertForbidden();
        $this->actingAs($this->admin())->get(route('admin.quality-recognition.show', $submission))->assertOk()->assertSee('Results.pdf')->assertSee('Team.png')->assertSee($url);
        $response = $this->get($url)->assertOk()->assertDownload('Results.pdf')->assertHeader('X-Content-Type-Options', 'nosniff');
        $this->assertSame(Storage::disk('local')->get($file['path']), $response->streamedContent());
        $this->get(route('admin.quality-recognition.evidence', [$submission, (string) \Illuminate\Support\Str::uuid()]))->assertNotFound();
        Storage::disk('local')->delete($file['path']);
        $this->get($url)->assertNotFound();
    }

    public function test_invalid_evidence_files_are_rejected_before_saving_or_sending_mail(): void
    {
        foreach ([
            [UploadedFile::fake()->create('script.php', 1, 'application/x-httpd-php')],
            [UploadedFile::fake()->create('large.pdf', 5121, 'application/pdf')],
            array_map(fn ($i) => UploadedFile::fake()->create('file'.$i.'.pdf', 1, 'application/pdf'), range(1, 6)),
        ] as $files) {
            $this->post(route('quality-recognition.store'), $this->payload() + ['evidence_files' => $files])->assertSessionHasErrors();
        }
        $this->assertSame(0, QualityRecognitionSubmission::count());
        $this->assertSame([], Storage::disk('local')->allFiles());
        Mail::assertNothingSent();
    }

    public function test_evidence_download_cannot_access_another_submissions_file(): void
    {
        $this->post(route('quality-recognition.store'), $this->payload() + ['evidence_files' => [UploadedFile::fake()->image('proof.png')]])->assertRedirect();
        $first = QualityRecognitionSubmission::firstOrFail();
        $payload = $this->payload();
        $payload['company_name'] = 'Another company';
        $this->post(route('quality-recognition.store'), $payload)->assertRedirect();
        $second = QualityRecognitionSubmission::latest('id')->firstOrFail();
        $this->actingAs($this->admin())->get(route('admin.quality-recognition.evidence', [$second, $first->evidence_files[0]['id']]))->assertNotFound();
        $this->delete(route('admin.quality-recognition.destroy', $first))->assertRedirect();
        $this->get(route('admin.quality-recognition.show', $first))->assertRedirect();
        $this->assertTrue($first->fresh()->trashed());
    }

    public function test_storage_failure_rolls_back_submission_and_does_not_send_mail(): void
    {
        $disk = Mockery::mock(\Illuminate\Filesystem\FilesystemAdapter::class);
        $disk->shouldReceive('putFileAs')->twice()->andReturn('quality-recognition/stored-proof.png', false);
        $disk->shouldReceive('delete')->with(['quality-recognition/stored-proof.png'])->once()->andReturn(true);
        Storage::shouldReceive('disk')->with('local')->andReturn($disk);
        $this->post(route('quality-recognition.store'), $this->payload() + ['evidence_files' => [UploadedFile::fake()->image('proof.png'), UploadedFile::fake()->image('second.png')]])->assertSessionHasErrors('evidence_files');
        $this->assertSame(0, QualityRecognitionSubmission::count());
        Mail::assertNothingSent();
    }
}
