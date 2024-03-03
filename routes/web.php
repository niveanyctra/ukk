<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
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

Route::get('/', [FrontEndController::class, 'home'])->name('home');
Route::post('/search', [FrontEndController::class, 'search'])->name('search');
Route::post('/comment/{id}', [CommentController::class, 'comment'])->name('comment')->middleware('auth');
Route::get('/{id}/comment', [CommentController::class, 'destroy'])->name('comment.destroy')->middleware('auth');
Route::post('/like/{id}', [LikeController::class, 'like'])->name('like')->middleware('auth');

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.proccess');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('buat-akun', [RegisterController::class, 'register'])->name('register.proccess');

Route::controller(UserController::class)->prefix('user')->name('user.')->group(function () {
    Route::get('/{username}', 'show')->name('show');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}/update', 'update')->name('update');
    Route::get('/{id}/destroy', 'destroy')->name('destroy');
});
Route::middleware([Authenticate::class])->group(function() {
    Route::controller(AlbumController::class)->prefix('album')->name('album.')->group(function () {
        Route::get('/{id}/show', 'show')->name('show');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}/update', 'update')->name('update');
        Route::get('/{id}/destroy', 'destroy')->name('destroy');
    });
    Route::controller(PhotoController::class)->prefix('photo')->name('photo.')->group(function () {
        Route::get('/{id}/show', 'show')->name('show');
        Route::get('/{id}/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}/update', 'update')->name('update');
        Route::get('/{id}/destroy', 'destroy')->name('destroy');
    });
});
