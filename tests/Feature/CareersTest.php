<?php

namespace Tests\Feature;

use App\Models\Career;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CareersTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:', 'session.driver' => 'array', 'cache.default' => 'array']);
        DB::purge('sqlite');
        (require database_path('migrations/2026_10_13_000001_create_careers_table.php'))->up();
        Schema::create('logos', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('alt_text')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
        });
        DB::table('logos')->insert(['id' => 1, 'logo' => '/backend/assets/images/logo/logo-ppf.png']);
        Schema::create('scrolling_messages', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('message')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Storage::fake('public');
    }

    private function admin(): User
    {
        $user = new User(['type' => 'admin', 'name' => 'Careers Admin']);
        $user->id = 42;

        return $user;
    }

    private function postData(array $overrides = []): array
    {
        return array_replace(['title' => 'Quality Engineer', 'description' => '<p>Join our <strong>quality team</strong>.</p><ul><li>Review projects</li></ul>', 'status' => 'published'], $overrides);
    }

    public function test_admin_can_publish_a_written_post_and_it_appears_on_frontend(): void
    {
        $this->actingAs($this->admin())->get(route('admin.careers.create'))->assertOk()->assertSee('form-control editor')->assertSee('Job poster image');
        $this->post(route('admin.careers.store'), $this->postData(['created_by' => 999]))->assertRedirect(route('admin.careers.index'));
        $career = Career::firstOrFail();
        $this->assertSame(42, $career->created_by);
        $this->assertNull($career->poster_path);
        $this->get(route('careers.index'))->assertOk()->assertSee('Quality Engineer');
        $this->get(route('careers.show', $career->id))->assertOk()->assertSee('<strong>quality team</strong>', false);
        $this->get(route('admin.careers.index'))->assertOk()->assertSee('Quality Engineer');
    }

    public function test_admin_can_publish_poster_without_description(): void
    {
        $this->actingAs($this->admin())->post(route('admin.careers.store'), $this->postData(['description' => '', 'poster' => UploadedFile::fake()->image('job-poster.png', 500, 800)]))->assertRedirect();
        $career = Career::firstOrFail();
        Storage::disk('public')->assertExists($career->poster_path);
        $this->get(route('careers.show', $career->id))->assertOk()->assertSee($career->poster_url)->assertSee('Job poster for Quality Engineer');
        $this->get(route('careers.poster', $career->id))->assertOk()->assertHeader('content-type', 'image/png');
    }

    public function test_empty_editor_and_invalid_poster_are_rejected(): void
    {
        $this->actingAs($this->admin())->post(route('admin.careers.store'), $this->postData(['description' => '<p><br></p><p>&nbsp;</p>']))->assertSessionHasErrors('description');
        $this->post(route('admin.careers.store'), $this->postData(['poster' => UploadedFile::fake()->create('poster.svg', 10, 'image/svg+xml')]))->assertSessionHasErrors('poster');
        $this->assertSame(0, Career::count());
    }

    public function test_drafts_and_removed_posts_are_not_publicly_accessible(): void
    {
        $this->actingAs($this->admin())->post(route('admin.careers.store'), $this->postData(['status' => 'draft']))->assertRedirect();
        $career = Career::firstOrFail();
        $this->get(route('careers.index'))->assertOk()->assertDontSee('Quality Engineer')->assertSee('No openings posted yet.');
        $this->get(route('careers.show', $career->id))->assertNotFound();
        $this->put(route('admin.careers.update', $career), $this->postData())->assertRedirect();
        $this->get(route('careers.show', $career->id))->assertOk();
        $this->delete(route('admin.careers.destroy', $career))->assertRedirect();
        $this->assertSoftDeleted('careers', ['id' => $career->id]);
        $this->get(route('careers.show', $career->id))->assertNotFound();
    }

    public function test_edit_keeps_existing_poster_and_validates_removal(): void
    {
        $this->actingAs($this->admin())->post(route('admin.careers.store'), $this->postData(['description' => '', 'poster' => UploadedFile::fake()->image('poster.jpg')]))->assertRedirect();
        $career = Career::firstOrFail();
        $original = $career->poster_path;
        $this->put(route('admin.careers.update', $career), $this->postData(['description' => '', 'title' => 'Updated opening']))->assertRedirect();
        $this->assertSame($original, $career->fresh()->poster_path);
        $this->put(route('admin.careers.update', $career), $this->postData(['description' => '', 'remove_poster' => 1]))->assertSessionHasErrors('description');
        Storage::disk('public')->assertExists($original);
        $this->put(route('admin.careers.update', $career), $this->postData(['remove_poster' => 1]))->assertRedirect();
        $this->assertNull($career->fresh()->poster_path);
        Storage::disk('public')->assertMissing($original);
    }

    public function test_replacing_poster_removes_old_file_and_keeps_new_one(): void
    {
        $this->actingAs($this->admin())->post(route('admin.careers.store'), $this->postData(['poster' => UploadedFile::fake()->image('old.png')]))->assertRedirect();
        $career = Career::firstOrFail();
        $original = $career->poster_path;
        $this->put(route('admin.careers.update', $career), $this->postData(['poster' => UploadedFile::fake()->image('new.png')]))->assertRedirect();
        Storage::disk('public')->assertMissing($original);
        Storage::disk('public')->assertExists($career->fresh()->poster_path);
    }

    public function test_description_is_sanitized_and_preserves_editor_formatting(): void
    {
        $html = '<p style="color: red; text-align: center" onclick="alert(1)"><strong>Join us</strong></p><script>alert(1)</script><a href="javascript:alert(1)">unsafe</a>';
        $this->actingAs($this->admin())->post(route('admin.careers.store'), $this->postData(['description' => $html]))->assertRedirect();
        $career = Career::firstOrFail();
        $this->assertStringContainsString('<strong>Join us</strong>', $career->description);
        $this->assertStringContainsString('text-align:center', str_replace(' ', '', $career->description));
        $this->assertStringNotContainsString('<script', $career->description);
        $this->assertStringNotContainsString('onclick', $career->description);
        $this->assertStringNotContainsString('javascript:', $career->description);
        $this->post(route('admin.careers.store'), $this->postData(['application_url' => 'javascript:alert(1)']))->assertSessionHasErrors('application_url');
    }

    public function test_only_admin_can_manage_careers(): void
    {
        $this->get(route('admin.careers.index'))->assertRedirect(route('login'));
        $career = Career::create($this->postData() + ['created_by' => 42, 'updated_by' => 42]);
        foreach (['primary', 'editor'] as $type) {
            $user = new User(['type' => $type]);
            $user->id = 9;
            $this->actingAs($user)->post(route('admin.careers.store'), $this->postData())->assertStatus($type === 'editor' ? 403 : 302);
            $this->put(route('admin.careers.update', $career), $this->postData())->assertStatus($type === 'editor' ? 403 : 302);
            $this->delete(route('admin.careers.destroy', $career))->assertStatus($type === 'editor' ? 403 : 302);
        }
        $this->assertSame(1, Career::count());
    }

    public function test_frontend_pagination_and_footer_link(): void
    {
        for ($i = 1; $i <= 13; $i++) {
            Career::create($this->postData(['title' => 'Opening '.$i]) + ['created_by' => 42, 'updated_by' => 42]);
        }
        $response = $this->get(route('careers.index'));
        $response->assertOk()->assertSee('page=2')->assertSee(route('careers.index'));
        $this->assertSame(12, $response->viewData('careers')->count());
        $this->get(route('careers.index', ['page' => 2]))->assertOk();
    }

    public function test_draft_poster_is_available_only_to_admin_and_missing_images_return_404(): void
    {
        $this->actingAs($this->admin())->post(route('admin.careers.store'), $this->postData(['status' => 'draft', 'poster' => UploadedFile::fake()->image('draft.png')]))->assertRedirect();
        $career = Career::firstOrFail();
        $this->get(route('careers.poster', $career->id))->assertNotFound();
        $this->get(route('admin.careers.poster', $career))->assertOk();
        $this->put(route('admin.careers.update', $career), $this->postData())->assertRedirect();
        $this->get(route('careers.poster', $career->id))->assertOk();
        Storage::disk('public')->delete($career->poster_path);
        $this->get(route('careers.poster', $career->id))->assertNotFound();
        $member = new User(['type' => 'editor']);
        $member->id = 9;
        $this->actingAs($member)->get(route('admin.careers.poster', $career))->assertForbidden();
    }

    public function test_career_admin_list_has_shared_datatable_and_edit_delete_actions_for_all_rows(): void
    {
        for ($i = 1; $i <= 26; $i++) {
            Career::create($this->postData(['title' => 'Opening '.$i]) + ['created_by' => 42, 'updated_by' => 42]);
        }
        $response = $this->actingAs($this->admin())->get(route('admin.careers.index'));
        $response->assertOk()->assertSee('id="basic-1"', false)->assertSee('display table table-sm table-striped')->assertSee('Edit job post')->assertSee('Delete job post');
        $this->assertCount(26, $response->viewData('careers'));
        $career = Career::firstOrFail();
        $this->get(route('admin.careers.edit', $career))->assertOk()->assertSee($career->title)->assertSee('Enter job title, e.g. Quality Engineer')->assertSee('data-placeholder=', false);
    }
}
