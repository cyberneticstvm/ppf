<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('admin.login');
})->name('login');

Route::middleware(['web'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::post('/login', 'login')->name('signin');
        Route::get('/createuser', 'createuser')->name('createuser');
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
});
