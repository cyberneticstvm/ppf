<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GalleryImageController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\Publicationcontroller;
use App\Http\Controllers\ScrollingMessageController;
use App\Http\Controllers\SiteManagementController;
use App\Http\Controllers\ThoughtController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('admin.login');
})->name('login');


Route::middleware(['web'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::post('/', 'index')->name('index');
        Route::post('/login', 'login')->name('signin');
        //Route::get('/createuser', 'createuser')->name('createuser');
        Route::get('/membership', 'membership')->name('membership');
    });

    Route::controller(MembershipController::class)->group(function () {
        Route::get('/membership', 'create')->name('membership');
        Route::post('/membership', 'store')->name('apply.membership');
    });

    Route::controller(WebController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/about', 'about')->name('about');
        Route::get('/officials', 'officials')->name('officials');
        Route::get('/events', 'events')->name('events');
        Route::get('/events/all/{id}', 'eventsAll')->name('events.all');
        Route::get('/publications', 'publications')->name('publications');
        Route::get('/gallery', 'gallery')->name('gallery');
        Route::get('/community', 'community')->name('community');
        Route::get('/contact', 'contact')->name('contact');
    });
});

Route::prefix('/admin')->middleware(['web', 'auth'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/logout', 'logout')->name('logout');
    });

    Route::prefix('/category')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('category');
        Route::get('/create', 'create')->name('category.create');
        Route::post('/save', 'store')->name('category.save');
        Route::get('/edit/{id}', 'edit')->name('category.edit');
        Route::post('/edit/{id}', 'update')->name('category.update');
        Route::get('/delete/{id}', 'destroy')->name('category.delete');
    });

    Route::prefix('/gallery')->controller(GalleryController::class)->group(function () {
        Route::get('/', 'index')->name('gallery');
        Route::get('/create', 'create')->name('gallery.create');
        Route::post('/save', 'store')->name('gallery.save');
        Route::get('/edit/{id}', 'edit')->name('gallery.edit');
        Route::post('/edit/{id}', 'update')->name('gallery.update');
        Route::get('/delete/{id}', 'destroy')->name('gallery.delete');
    });

    Route::prefix('/gallery/image')->controller(GalleryImageController::class)->group(function () {
        Route::get('/create/{id}', 'create')->name('gallery.image.create');
        Route::post('/save', 'store')->name('gallery.image.save');
        Route::get('/edit/{id}', 'edit')->name('gallery.image.edit');
        Route::post('/edit/{id}', 'update')->name('gallery.image.update');
        Route::get('/delete/{id}', 'destroy')->name('gallery.image.delete');
    });

    Route::prefix('/event')->controller(EventController::class)->group(function () {
        Route::get('/', 'index')->name('event');
        Route::get('/create', 'create')->name('event.create');
        Route::post('/save', 'store')->name('event.save');
        Route::get('/edit/{id}', 'edit')->name('event.edit');
        Route::post('/edit/{id}', 'update')->name('event.update');
        Route::get('/delete/{id}', 'destroy')->name('event.delete');
    });

    Route::prefix('/scrolling')->controller(ScrollingMessageController::class)->group(function () {
        Route::get('/', 'index')->name('scrolling');
        Route::get('/create', 'create')->name('scrolling.create');
        Route::post('/save', 'store')->name('scrolling.save');
        Route::get('/edit/{id}', 'edit')->name('scrolling.edit');
        Route::post('/edit/{id}', 'update')->name('scrolling.update');
        Route::get('/delete/{id}', 'destroy')->name('scrolling.delete');
    });

    Route::prefix('/publication')->controller(Publicationcontroller::class)->group(function () {
        Route::get('/', 'index')->name('publication');
        Route::get('/create', 'create')->name('publication.create');
        Route::post('/save', 'store')->name('publication.save');
        Route::get('/edit/{id}', 'edit')->name('publication.edit');
        Route::post('/edit/{id}', 'update')->name('publication.update');
        Route::get('/delete/{id}', 'destroy')->name('publication.delete');
    });

    Route::prefix('/advertisement')->controller(AdvertisementController::class)->group(function () {
        Route::get('/', 'index')->name('advertisement');
        Route::get('/create', 'create')->name('advertisement.create');
        Route::post('/save', 'store')->name('advertisement.save');
        Route::get('/edit/{id}', 'edit')->name('advertisement.edit');
        Route::post('/edit/{id}', 'update')->name('advertisement.update');
        Route::get('/delete/{id}', 'destroy')->name('advertisement.delete');
    });

    Route::prefix('/thought')->controller(ThoughtController::class)->group(function () {
        Route::get('/', 'index')->name('thought');
        Route::get('/edit/{id}', 'edit')->name('thought.edit');
        Route::post('/edit/{id}', 'update')->name('thought.update');
        Route::get('/delete/{id}', 'destroy')->name('thought.delete');
    });

    Route::prefix('/member')->controller(MembershipController::class)->group(function () {
        Route::get('/', 'index')->name('member');
        Route::get('/pending', 'pending')->name('member.pending');
        Route::get('/rejected', 'rejected')->name('member.rejected');
        Route::get('/renewal', 'renewal')->name('member.renewal');
        Route::get('/edit/{id}', 'edit')->name('member.edit');
        Route::post('/edit/{id}', 'update')->name('member.update');
        Route::get('/show/{id}', 'show')->name('member.show');
        Route::get('/delete/{id}', 'destroy')->name('member.delete');
    });

    Route::prefix('/logo')->controller(SiteManagementController::class)->group(function () {
        Route::get('/', 'logo')->name('logo');
        Route::post('/', 'logoUpdate')->name('logo.update');
    });

    Route::prefix('/slider')->controller(SiteManagementController::class)->group(function () {
        Route::get('/', 'slider')->name('slider');
        Route::get('/create', 'sliderCreate')->name('slider.create');
        Route::post('/save', 'sliderStore')->name('slider.save');
        Route::get('/edit/{id}', 'sliderEdit')->name('slider.edit');
        Route::post('/edit/{id}', 'sliderUpdate')->name('slider.update');
        Route::get('/delete/{id}', 'sliderDestroy')->name('slider.delete');
    });

    Route::prefix('/about')->controller(SiteManagementController::class)->group(function () {
        Route::get('/', 'about')->name('about');
        Route::post('/', 'aboutUpdate')->name('about.update');
    });

    Route::prefix('/official')->controller(SiteManagementController::class)->group(function () {
        Route::get('/', 'official')->name('official');
        Route::get('/create', 'officialCreate')->name('official.create');
        Route::post('/save', 'officialStore')->name('official.save');
        Route::get('/edit/{id}', 'officialEdit')->name('official.edit');
        Route::post('/edit/{id}', 'officialUpdate')->name('official.update');
        Route::get('/delete/{id}', 'officialDestroy')->name('official.delete');
    });
});
