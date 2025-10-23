<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Read All & Show → Bisa diakses semua (tanpa autentikasi)
| Create, Update, Destroy → Hanya bisa oleh admin (middleware 'admin')
|--------------------------------------------------------------------------
*/

// GENRES
Route::controller(GenreController::class)->group(function () {
    Route::get('/genres', 'index');     // semua bisa akses
    Route::get('/genres/{id}', 'show'); // semua bisa akses

    Route::middleware('admin')->group(function () {
        Route::post('/genres', 'store');
        Route::put('/genres/{id}', 'update');
        Route::delete('/genres/{id}', 'destroy');
    });
});

// AUTHORS
Route::controller(AuthorController::class)->group(function () {
    Route::get('/authors', 'index');
    Route::get('/authors/{id}', 'show');

    Route::middleware('admin')->group(function () {
        Route::post('/authors', 'store');
        Route::put('/authors/{id}', 'update');
        Route::delete('/authors/{id}', 'destroy');
    });
});

// BOOKS
Route::controller(BookController::class)->group(function () {
    Route::get('/books', 'index');
    Route::get('/books/{id}', 'show');

    Route::middleware('admin')->group(function () {
        Route::post('/books', 'store');
        Route::put('/books/{id}', 'update');
        Route::delete('/books/{id}', 'destroy');
    });
});
