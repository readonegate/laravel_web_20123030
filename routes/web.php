<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;



require __DIR__ . '\pages\auth.php';


Route::get('/', function () {
    return redirect()->route('blog.gallery');
});

Route::get('profile', [BlogController::class, 'profile'])->name('blog.profile');
Route::get('gallery', [BlogController::class, 'gallery'])->name('blog.gallery');
Route::get('contact', [BlogController::class, 'contact'])->name('blog.contact');
