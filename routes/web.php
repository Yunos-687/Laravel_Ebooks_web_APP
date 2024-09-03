<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\checkIfAdmin;
// Route for the homepage displaying genres
// i will use it later to act as the route for my home page 
//Route::get('/', [BookController::class, 'index'])->name('home');

// Route for displaying books by genre
Route::get('/books/{genre}', [BookController::class, 'showByGenre'])->name('books.by.genre');

Route::get('/', function () {
    return view('welcomeCustome');
});

// routes/web.php
use App\Http\Controllers\TokenController;

Route::post('/create-token', [TokenController::class, 'createToken'])->name('create.token');
Route::get('/create-token', function () {
    return view('create-token'); // The Blade view file is resources/views/create-token.blade.php
})->name('show.create.token');

Route::get('/myfavorites', function () {
    return view('favorite-books'); // Make sure this view exists in your resources/views directory
})->middleware(['auth', 'verified'])->name('myfavorites');


Route::POST('/favorite/add', [FavoriteController::class, 'store']);
Route::delete('/favorite/remove', [FavoriteController::class, 'destroy']);

Route::get('/download/{filename}', [DownloadController::class, 'download'])->name('download');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:sanctum', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






require __DIR__.'/auth.php';
