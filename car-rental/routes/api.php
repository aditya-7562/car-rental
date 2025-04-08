<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public API Routes
Route::post('/login', [AuthController::class, 'apiLogin']);

// Protected API Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    // Car API Routes
    Route::get('/cars', [CarController::class, 'index']);
    Route::get('/cars/{car}', [CarController::class, 'show']);
    
    // Booking API Routes
    Route::get('/bookings', [BookingController::class, 'index']);
    Route::post('/cars/{car}/book', [BookingController::class, 'store']);
    Route::get('/bookings/{booking}', [BookingController::class, 'show']);
    Route::patch('/bookings/{booking}/cancel', [BookingController::class, 'cancel']);
}); 