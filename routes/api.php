<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiFavoriteBooksController;
use App\Http\Controllers\ApiBooksByGenreController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/favorite-books', [ApiFavoriteBooksController::class, 'index'])->middleware('auth:sanctum');


// public API with put authentication
Route::get('/books/{genre}', [ApiBooksByGenreController::class, 'index']);