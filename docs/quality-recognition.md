# Quality Excellence Recognition

The public form is at `/quality-recognition`. The admin menu **Quality Recognition → Submissions & Approval** opens `/admin/quality-recognition`. Access to submissions, review actions, email retries, and certificates is restricted to users whose type is `admin`.

## Configuration

Set the following variable in `.env` before accepting live entries:

```dotenv
QUALITY_RECOGNITION_NOTIFICATION_EMAIL=your-team@example.com
```

The existing `MAIL_*` settings supply the mail transport and sender. Use a working SMTP or other delivery transport; `log` and `array` mailers do not deliver messages to inboxes. Set `APP_URL` to the actual website URL so links in notification emails point to the correct admin panel.

After updating deployment environment settings, refresh configuration using the site's usual deployment process (for example, `php artisan config:cache`).

Deploy the new table with:

```shell
php artisan migrate --path=database/migrations/2026_10_10_000001_create_quality_recognition_submissions_table.php
```

The local migration check reported **Nothing to migrate**, so it is already recorded as applied in the current local database. No older migrations were run for this feature.

## Submission flow

1. The applicant completes the seven questions and company details, optionally selects evidence types, and reviews the entry before confirming submission. It also works without JavaScript, with direct form submission and server validation.
   During the final confirmation, the submit button displays the existing Bootstrap spinner and is disabled while saving the entry and preparing its acknowledgement. The review step itself does not start the loading state. Returning to a cached page resets the button and review state; validation redirects render a fresh enabled form.
2. A database entry is saved with a unique reference and a `pending` review status. One normalized company name/country combination is permitted per award year, backed by a unique database key.
3. An acknowledgement is sent to the applicant's email with an attached PDF copy of their submitted answers. The PDF includes the reference, submission date, all company/contact fields, seven responses, optional evidence choices, impact metric, showcase answer, and consent preferences. Internal admin review notes are excluded. A separate message sends the complete entry and admin review link to the configured PPF address. Both use the existing Laravel mail configuration.
4. The thank-you page displays the reference within the applicant's session. There is no public endpoint exposing submitted entry details.
5. Admins can filter and review entries, set `pending`, `approved`, or `rejected`, record internal notes, and retry any pending submission emails. Review notes are not sent to applicants.

The admin list uses the same shared DataTables layout and search, sorting, page-size, and pagination features as the existing modules. Admins can delete a submission from the list or its review page after confirmation. This is a soft delete: the original record is retained but hidden from normal review, retry, and certificate routes. The company/year uniqueness reservation remains, so a removed record does not allow a second entry for the same award year.

Deploy the deletion support with `php artisan migrate --path=database/migrations/2026_10_13_000002_add_soft_deletes_to_quality_recognition_submissions.php`. This has been applied to the local database.

The form separates contact email and optional phone from the reference form's combined field. It separates optional follow-up consent from optional best-practice publication consent, and requires acknowledgement of the displayed rules. Evidence selections describe what could be shared later; they do not upload files.

PDF generation or mail failure does not roll back the saved entry or block the on-screen acknowledgement. The admin delivery indicators show which messages are pending. Once SMTP and the recipient are configured, **Retry pending emails** sends the unsent messages without deliberately resending messages already recorded as sent. Retrying an acknowledgement regenerates and attaches the answers PDF from the saved submission. The attachment is generated in memory and is not saved in public storage. Delivery indicators record acceptance by the configured mail transport, not inbox delivery or bounce status.

## Certificates - manual admin delivery

Submitting an entry or approving it does not email a certificate. The admin verifies submissions in the panel and sends certificates manually. The acknowledgement attachment is an answers copy, not a certificate.

The admin PDF endpoint uses the already installed DomPDF package and permits generation only for an approved entry. It is disabled until the final certificate Blade template exists and is configured:

```dotenv
QUALITY_RECOGNITION_CERTIFICATE_VIEW=quality-recognition.certificate
```

Once the supplied artwork is implemented as `resources/views/quality-recognition/certificate.blade.php`, the **Download PDF certificate** button becomes available on approved submissions. The view receives `$submission`. The current generator uses landscape A4; adjust the paper size/orientation to the supplied artwork. No provisional certificate is issued, and no award is granted automatically upon submission. The test-only certificate fixture is not a production certificate.

The existing optional endpoint downloads a certificate for an authenticated admin only, once a template has been provided. The admin is responsible for sending the certificate manually.

## Implementation map

### Optional supporting uploads

The evidence section accepts up to five non-confidential files, each at most 5 MB: PDF, JPG/JPEG, PNG, WebP, Word, Excel and PowerPoint. The selected names appear in the frontend review step. On validation failure, applicants must reselect files because browsers do not repopulate file inputs.

Files are stored on the explicit `local` disk under `storage/app/quality-recognition/{public_id}/`, outside the public directory. The nullable JSON `evidence_files` database column records each file's UUID, original display name, storage path, detected MIME type and size. The migration is `2026_10_14_000001_add_evidence_files_to_quality_recognition_submissions.php`; deploy it using `php artisan migrate`.

Admins download the files from the submission detail screen through an authenticated, admin-only endpoint. The requested file must belong to that submission. Files are never attached to either notification email; the applicant still receives the existing answers PDF only. Soft-deleted submissions retain their files with the retained database record, but their download endpoints become inaccessible.

Submission creation and file metadata updates use a database transaction; if storage or database persistence fails, the transaction is rolled back and newly stored files are removed. Set PHP `upload_max_filesize` to at least `5M` and `post_max_size` above the combined 25 MB file limit (for example `32M`), with equivalent web-server request-body limits. The local PHP configuration already permits these sizes.

| Area | Files |
| --- | --- |
| Questions, labels, evidence choices, recipient, certificate template | `config/quality_recognition.php` |
| Public validation and duplicate checks | `app/Http/Requests/StoreQualityRecognitionRequest.php` |
| Submission persistence and acknowledgement page | `app/Http/Controllers/QualityRecognitionController.php` |
| Admin listing, review, and retry actions | `app/Http/Controllers/AdminQualityRecognitionController.php` |
| Approved-entry PDF generation | `app/Http/Controllers/QualityRecognitionCertificateController.php` |
| Emails and independent retry tracking | `app/Mail/QualityRecognitionMail.php`, `app/Services/QualityRecognitionNotifications.php` |
| Applicant answers PDF | `app/Services/QualityRecognitionAnswersPdf.php`, `resources/views/quality-recognition/answers-pdf.blade.php` |
| Storage | `app/Models/QualityRecognitionSubmission.php`, the migration above |
| Public UI | `resources/views/quality-recognition/`, `public/frontend/assets/css/quality-recognition.css`, `public/frontend/assets/js/quality-recognition.js` |
| Admin UI | `resources/views/admin/quality-recognition/` |

## Verification

```shell
php artisan test --compact --filter=QualityRecognitionTest
php artisan test --compact
node --check public/frontend/assets/js/quality-recognition.js
```

The recognition feature tests run against an in-memory SQLite database and mocked mail delivery. They cover validation, persistence, email recipients, mail failure and retry, normalized duplicate rejection, injected approval fields, private admin access, review status changes, certificate approval/template requirements, actual PDF output from a test fixture, escaped email content, and the session-bound thank-you page. The initial project review saw a homepage HTTP 500 in the existing test; the subsequent full suite passed in the current local environment (15 tests, 93 assertions).

The answers attachment update also tests actual MIME message construction through Laravel's in-memory mail transport, PDF attachment type/name/content, generation failure and retry, inclusion of all answers, exclusion of internal review notes, and the absence of certificate emails on approval. A four-page sample with long responses was rendered and visually reviewed for pagination and readability.

After this update, the full suite passed with 18 tests and 146 assertions.

Browser checks covered the live frontend, the review/edit interaction without creating a live entry, and the layout at desktop and 390px mobile width. No live emails were sent for testing.
