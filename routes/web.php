<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;



require __DIR__ . '\pages\auth.php';


Route::middleware('login')->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard.index');
    });

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::resource('books', BookController::class);
});


Route::get('profile', [BlogController::class, 'profile'])->name('blog.profile');
Route::get('gallery', [BlogController::class, 'gallery'])->name('blog.gallery');
Route::get('contact', [BlogController::class, 'contact'])->name('blog.contact');
