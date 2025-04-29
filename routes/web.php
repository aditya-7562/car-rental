<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'storeContact'])->name('contact.store');

// Cars Routes
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

// Authentication Routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware('auth')->group(function () {
    // Booking Routes
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/cars/{car}/book', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/cars/{car}/book', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::patch('/bookings/{booking}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
});

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Users Management
    Route::get('/users', [AdminController::class, 'users'])->name('users.index');
    Route::get('/users/{user}', [AdminController::class, 'showUser'])->name('users.show');
    
    // Bookings Management
    Route::get('/bookings', [AdminController::class, 'bookings'])->name('bookings.index');
    Route::get('/bookings/{booking}', [AdminController::class, 'showBooking'])->name('bookings.show');
    Route::patch('/bookings/{booking}/status', [AdminController::class, 'updateBookingStatus'])->name('bookings.status');
    
    // Cars Management
    Route::get('/cars', [AdminController::class, 'cars'])->name('cars.index');
    Route::get('/cars/create', [AdminController::class, 'createCar'])->name('cars.create');
    Route::post('/cars', [AdminController::class, 'storeCar'])->name('cars.store');
    Route::get('/cars/{car}', [AdminController::class, 'showCar'])->name('cars.show');
    Route::get('/cars/{car}/edit', [AdminController::class, 'editCar'])->name('cars.edit');
    Route::patch('/cars/{car}', [AdminController::class, 'updateCar'])->name('cars.update');
    Route::patch('/cars/{car}/availability', [AdminController::class, 'updateCarAvailability'])->name('cars.availability');
    
    // Contact Messages Management
    Route::get('/messages', [AdminController::class, 'contactMessages'])->name('messages.index');
    Route::get('/messages/{message}', [AdminController::class, 'showContactMessage'])->name('messages.show');
    Route::patch('/messages/{message}/read', [AdminController::class, 'markMessageAsRead'])->name('messages.read');
    Route::delete('/messages/{message}', [AdminController::class, 'deleteMessage'])->name('messages.delete');
});

Route::get('storage/{path}', function($path) {
    $filePath = storage_path('app/public/' . $path);
    if (!file_exists($filePath)) {
        abort(404, 'File not found');
    }
    return response()->file($filePath);
})->where('path', '.*');