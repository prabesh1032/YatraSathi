<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TravellerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/traveltips', [PageController::class, 'traveltips'])->name('traveltips');
Route::get('/adventure', [PageController::class, 'adventure'])->name('adventure');
Route::get('/whyToChooseUs', [PageController::class, 'whyToChooseUs'])->name('whyToChooseUs');
Route::get('/search', [PageController::class, 'search'])->name('search');

Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/review/store', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/review', [ReviewController::class, 'index'])->name('reviews.index');
Route::delete('/review/{id}/destroy', [ReviewController::class, 'destroy'])->name('reviews.destroy');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/travellers',[TravellerController::class,'index'])->name('travellers.index');

Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
Route::get('/allpackages', [PackageController::class, 'package'])->name('packages');
Route::get('/packages/{package}/show', [PackageController::class, 'show'])->name('packages.show');
Route::get('/readpackages/{package}', [PackageController::class, 'read'])->name('packages.read');
Route::get('/packages/create', [PackageController::class, 'create'])->name('packages.create');
Route::post('/packages/store', [PackageController::class, 'store'])->name('packages.store');
Route::get('/packages/{id}/edit', [PackageController::class, 'edit'])->name('packages.edit');
Route::put('/packages/{id}/update', [PackageController::class, 'update'])->name('packages.update');
Route::get('/packages/{id}/destroy', [PackageController::class, 'destroy'])->name('packages.destroy');

Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
Route::post('/messages/store', [MessageController::class, 'store'])->name('messages.store');

Route::middleware('auth')->group(function () {
    Route::post('/bookmarks', [BookmarkController::class, 'store'])->name('bookmarks.store');
    Route::get('/bookmarks', [BookmarkController::class, 'myBookmarks'])->name('bookmarks.index');
    Route::delete('/bookmarks/{bookmark}', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy');
    Route::get('/bookmarks/{bookmark}/checkout', [BookmarkController::class, 'checkout'])->name('bookmarks.checkout');

    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    // ->middleware('admin');
    // Update order status
    Route::get('/orders/{id}/{status}', [OrderController::class, 'status'])->name('orders.status');
    // Handle eSewa payment for orders
    Route::get('/ordersesewa/esewa/{packageId}', [OrderController::class, 'storeEsewa'])->name('order.storeEsewa');
    Route::post('/order/khalti/{packageId}', [OrderController::class, 'storeKhalti'])->name('order.storeKhalti');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
