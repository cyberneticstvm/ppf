# Careers

Admins can use **Careers → Add Job Post** in the sidebar. The public page is `/careers`, linked under **Organization** in the website footer. This module is independent of the existing Jobs/Schemes module.

## Posting workflow

- Enter a job title and write the description with the same Summernote editor used by other admin modules, upload a job poster image, or provide both.
- Posters accept JPG, PNG and WebP up to 5 MB. SVGs and other file types are rejected. An empty editor does not count as a description.
- Optional details include company, location, application link, and closing date. The application link opens the employer's application instructions; this module does not collect job applications.
- **Published** is the default. Published posts immediately appear in the public list and detail page. **Draft** keeps the post private to the admin panel.
- Admins can filter, edit, replace/remove a poster, change publishing status, or remove a post. Removal uses a soft delete and hides the public detail page.
- Closing dates are displayed as information; posts remain published until the admin changes their status or removes them.

Only accounts with type `admin` can manage Careers. Rich-text HTML is cleaned using the installed HTMLPurifier library while retaining supported editor formatting.

Posters are stored on Laravel's `public` disk and served through Careers routes. This works even when `public/storage` is a regular folder rather than a symlink. Public poster routes require a published, non-deleted post; draft poster previews require an authenticated admin. Existing uploads/storage configuration is not changed.

## Deployment

```shell
php artisan migrate --path=database/migrations/2026_10_13_000001_create_careers_table.php
```

This migration has been applied to the local database. Deploy the code and run the migration on the hosting server too. Ensure Laravel's storage directories are writable for uploads.

## Verification

```shell
php artisan test --compact --filter=CareersTest
```

The tests use an in-memory SQLite database and fake upload storage. They cover text-only and poster-only publishing, empty descriptions, invalid images, draft visibility, editing and poster retention/removal/replacement, safe rich text, restricted management access, pagination, and public versus admin poster delivery.
