<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Semua endpoint API project Laravel BookSales.
| Tugas 7 - Role-based access (Admin & Customer)
|--------------------------------------------------------------------------
*/

// 🔐 AUTHENTICATION ROUTES
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// 🔓 PUBLIC ROUTES (akses bebas)
Route::apiResource('genres', GenreController::class)->only(['index', 'show']);
Route::apiResource('authors', AuthorController::class)->only(['index', 'show']);
Route::apiResource('books', BookController::class)->only(['index', 'show']);

// 🔒 PROTECTED ROUTES (hanya untuk user terautentikasi)
Route::middleware(['auth:sanctum'])->group(function () {
    // 🧍 CUSTOMER ROUTES
    Route::middleware('role:customer')->group(function () {
        Route::post('/transactions', [TransactionController::class, 'store']);
        Route::get('/transactions/{id}', [TransactionController::class, 'show']);
        Route::put('/transactions/{id}', [TransactionController::class, 'update']);
    });

    // 🧑‍💼 ADMIN ROUTES
    Route::middleware('role:admin')->group(function () {
        Route::get('/transactions', [TransactionController::class, 'index']);
        Route::delete('/transactions/{id}', [TransactionController::class, 'destroy']);
    });

    // 🔐 LOGOUT
    Route::post('/logout', [AuthController::class, 'logout']);
});
