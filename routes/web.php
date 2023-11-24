<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GalleryImageController;
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
        Route::get('/createuser', 'createuser')->name('createuser');
    });

    Route::controller(WebController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });
});

Route::middleware(['web', 'auth'])->group(function () {
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
});
