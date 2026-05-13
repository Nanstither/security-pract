<?php

use App\Http\Controllers\LabAuthController;
use App\Http\Controllers\LabCommentController;
use App\Http\Controllers\LabHomeController;
use App\Http\Controllers\LabProfileController;
use App\Http\Controllers\LabRedirectController;
use App\Http\Controllers\LabSearchController;
use App\Http\Controllers\LabUserApiController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LabAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [LabAuthController::class, 'login']);

Route::get('/search', [LabSearchController::class, 'index'])->name('search');

Route::get('/comments', [LabCommentController::class, 'index'])->name('comments.index');
Route::post('/comments', [LabCommentController::class, 'store'])->name('comments.store');

Route::get('/redirect', [LabRedirectController::class, 'go'])->name('lab.redirect');

Route::get('/users/{id}', [LabUserApiController::class, 'show'])->name('lab.users.show');

Route::middleware('auth')->group(function (): void {
    Route::get('/', [LabHomeController::class, 'index'])->name('home');
    Route::post('/logout', [LabAuthController::class, 'logout'])->name('logout');

    Route::get('/profile', [LabProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/email', [LabProfileController::class, 'updateEmail'])->name('profile.email');
});
