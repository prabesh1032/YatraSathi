<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\PackageController;
use App\Models\Booking;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/packages/{id}', [PageController::class, 'package'])->name('packages.show');
Route::get('/destinations/{id}', [PageController::class, 'destination'])->name('destinations.show');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/destination', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destination/create', [DestinationController::class, 'create'])->name('destinations.create');
Route::post('/destination/store', [DestinationController::class, 'store'])->name('destinations.store');
Route::get('/destination/{id}/edit', [DestinationController::class, 'edit'])->name('destinations.edit');
Route::post('/destination/{id}/update', [DestinationController::class, 'update'])->name('destinations.update');
Route::get('/destination/{id}/destroy', [DestinationController::class, 'destroy'])->name('destinations.destroy');

Route::get('/booking', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/booking/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/booking/store', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/booking/{id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
Route::post('/booking/{id}/update', [BookingController::class, 'update'])->name('bookings.update');
Route::get('/booking/{id}/destroy', [BookingController::class, 'destroy'])->name('bookings.destroy');

Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
Route::get('/packages/create', [PackageController::class, 'create'])->name('packages.create');
Route::post('/packages/store', [PackageController::class, 'store'])->name('packages.store');
Route::get('/packages/{id}/edit', [PackageController::class, 'edit'])->name('packages.edit');
Route::put('/packages/{id}/update', [PackageController::class, 'update'])->name('packages.update');
Route::get('/packages/{id}/destroy', [PackageController::class, 'destroy'])->name('packages.destroy');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
