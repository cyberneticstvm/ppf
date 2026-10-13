# Project overview

Reviewed on 10 October 2026 in preparation for frontend and admin updates.

## Structure

This is the Progressive Professional Forum Kuwait site. The installed framework identified itself as Laravel 10.31.0, running locally on PHP 8.3.30. The application uses server-rendered Blade templates and Eloquent models. Business logic is primarily in controllers, with shared helper functions in `app/Helpers/Helper.php`.

The existing application has public routes, member routes under `/user`, and admin/editor routes under `/admin`. Most routing is in `routes/web.php`; the API file contains the standard Sanctum user endpoint. Custom `admin`, `user`, `active`, and `delete` middleware check account type and membership approval. The same admin layout is also used by member profile pages.

## Frontend

`resources/views/base.blade.php` supplies the common header, footer, mobile/floating menus, popups, and scripts. `resources/views/nav.blade.php` supplies the main navigation. Page templates render the home page, about, organization/unit officials, events, galleries, publications, community/jobs, schemes, contact, and membership applications.

The active UI loads assets directly from `public/frontend/assets` and `public/backend/assets`. The public theme uses Bootstrap, jQuery, Owl/Swiper, Fancybox, and the existing red primary color (`#e5102a`). The admin theme uses Bootstrap, DataTables, Summernote, Select2, and shared scripts. Vite configuration and default `resources/js`/`resources/css` files exist, but the main layouts do not use Vite for the current site theme.

## Admin and data modules

| Module | Main controller(s) | Main models |
| --- | --- | --- |
| Public content pages | `WebController` | Content models below |
| Authentication, password changes, member search, privacy settings, skills | `UserController`, `WebController` | `User`, `Membership`, `SkillSet`, `MemberSkillSet` |
| Membership applications, approvals, renewals, exports | `MembershipController` | `Membership`, `User` |
| Logo/contact header, sliders, about, officials, unit officials, lookup lists | `SiteManagementController` | `Logo`, `Slider`, `About`, `Official`, `Region`, `Profession`, `Qualification`, `Specialization` |
| Categories, gallery albums, gallery images | `CategoryController`, `GalleryController`, `GalleryImageController` | `Category`, `CategoryType`, `Gallery`, `GalleryImage` |
| Events and benevolent activities | `EventController`, `BenevolentController` | `Event`, `Benevolent` |
| Publications, advertisements, scrolling messages, submitted thoughts | Corresponding controllers | `Publication`, `Advertisement`, `ScrollingMessage`, `Thought` |
| Jobs and schemes | `JobController` | `Job`, `Country` |
| Quality Excellence Recognition (new) | Recognition controllers | `QualityRecognitionSubmission` |

Membership registration creates a user and membership transactionally, issues a type-specific membership number, starts with pending approval, and sends a registration email. Admins manage approval and renewal fields; member search supports qualification, profession, specialization, approval/type, and skills. Privacy settings control whether member email and mobile appear in search. `MembersExport` uses Laravel Excel. Many content models use soft deletion, and content controllers commonly expose deleted records in admin lists.

Uploads use `uploadFile()` and the Laravel public disk, returning `/storage/...` URLs. S3 configuration/dependencies are present, but the helper's S3 upload code is commented out. Email classes cover registration, renewal/status notification, general notification, and a custom password-reset flow. The scheduler has no active scheduled jobs. DomPDF, Excel, image, QR/barcode, and permission packages are installed; installation alone does not mean every package is used by a current workflow.

## Existing issues relevant to future changes

These observations concern existing code and have not been changed as part of the recognition integration:

- Member profile `show`, `edit`, and `update` use a route-supplied membership ID without a server-side owner check. UI restrictions on approval/account fields are not equivalent to server-side authorization.
- The custom password-reset update accepts an encrypted user ID but does not validate the reset token on the update request; token expiry is not implemented in that flow.
- Several route names are duplicated (`index`, `dashboard`, `benevolent`), and some routes refer to missing controller methods such as `UserController@index`. Changes should avoid reusing these names.
- Most existing CRUD writes accept broad request data into models with empty `$guarded` arrays; new modules should validate and explicitly select input.
- Destructive content actions use GET routes. The new recognition review and retry actions use CSRF-protected POST routes.
- Existing schema/code inconsistencies include the membership `reference` input missing from its checked-in migration, `editor` being used by middleware but absent from the checked-in user type enum, and job detail page titles reading `name` even though the job schema/form uses `title`.
- The jobs listing links to the scheme detail route. Some public detail/recent queries do not enforce active status consistently.
- Most original automated tests are Laravel examples. The new recognition tests add targeted feature coverage. The original README remains Laravel boilerplate; the seed class does not populate the site's required content/reference records.

This review maps application-owned code, templates, schema, configuration, and active asset entry points. It is not a line-by-line audit of bundled vendor libraries or unused theme demos, nor a complete authenticated browser audit of every existing module.

For the new feature's setup and outstanding certificate artwork, see `docs/quality-recognition.md`.
