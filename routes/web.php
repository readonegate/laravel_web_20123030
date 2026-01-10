<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('books', [BookController::class, 'index'])->name('books.index');
    Route::get('books/{book}', [BookController::class, 'show'])->name('books.show');

    Route::middleware('admin')->group(function () {
        Route::get('books/create', [BookController::class, 'create'])->name('books.create');
        Route::post('books', [BookController::class, 'store'])->name('books.store');
        Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
        Route::put('books/{book}', [BookController::class, 'update'])->name('books.update');
        Route::delete('books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
    });

    Route::get('authors', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('authors/{author}', [AuthorController::class, 'show'])->name('authors.show');

    Route::middleware('admin')->group(function () {
        Route::get('authors/create', [AuthorController::class, 'create'])->name('authors.create');
        Route::post('authors', [AuthorController::class, 'store'])->name('authors.store');
        Route::get('authors/{author}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
        Route::put('authors/{author}', [AuthorController::class, 'update'])->name('authors.update');
        Route::delete('authors/{author}', [AuthorController::class, 'destroy'])->name('authors.destroy');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// Route::middleware('login')->group(function () {
//     Route::get('/', function () {
//         return redirect()->route('dashboard.index');
//     });

//     Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
//     Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');

// });
// Route::resource('books', BookController::class);


// Route::get('profile', [BlogController::class, 'profile'])->name('blog.profile');
// Route::get('gallery', [BlogController::class, 'gallery'])->name('blog.gallery');
// Route::get('contact', [BlogController::class, 'contact'])->name('blog.contact');
