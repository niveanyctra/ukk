<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [FrontendController::class, 'home'])->name('home')->middleware('guest');
Route::post('/{id}/comment', [CommentController::class, 'comment'])->name('comment')->middleware('auth');
Route::post('/{id}/like', [LikeController::class, 'like'])->name('like')->middleware('auth');
Route::post('/search', [FrontendController::class, 'search'])->name('search')->middleware('auth');

Route::get('login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'login'])->name('login.proccess');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('buat-akun', [RegisterController::class, 'register'])->name('register.proccess');

Route::controller(AccountController::class)->prefix('account')->name('account.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}', 'update')->name('update');
    Route::get('/{id}', 'destroy')->name('destroy');
})->middleware('auth');
Route::get('/user/{id}', [AccountController::class, 'user'])->name('user');

Route::controller(AlbumController::class)->prefix('album')->name('album.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{id}/show', 'show')->name('show');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}', 'update')->name('update');
    Route::get('/{id}', 'destroy')->name('destroy');
})->middleware('auth');

Route::controller(PhotoController::class)->prefix('photo')->name('photo.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{id}/show', 'show')->name('show');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}', 'update')->name('update');
    Route::get('/{id}', 'destroy')->name('destroy');
})->middleware('auth');

Route::controller(CommentController::class)->prefix('comment')->name('comment.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{id}/show', 'show')->name('show');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}', 'update')->name('update');
    Route::get('/{id}', 'destroy')->name('destroy');
})->middleware('auth');
