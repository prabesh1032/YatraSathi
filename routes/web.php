<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\JourneyController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TravellerController;
use App\Http\Controllers\UserProfileController;
use App\Models\Guide;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/traveltips', [PageController::class, 'traveltips'])->name('traveltips');
Route::get('/adventure', [PageController::class, 'adventure'])->name('adventure');
Route::get('/whyToChooseUs', [PageController::class, 'whyToChooseUs'])->name('whyToChooseUs');
Route::get('/search', [PageController::class, 'search'])->name('search');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/journey/location', [PackageController::class, 'showLocationPage'])->name('location.index');
Route::get('/allguides', [GuideController::class, 'show'])->name('guides.show');
Route::get('/guides/{id}', [GuideController::class, 'profile'])->name('guides.profile');


Route::get('/packages/{package}/show', [PackageController::class, 'show'])->name('packages.show');
Route::get('/allpackages', [PackageController::class, 'package'])->name('packages');
Route::get('/readpackages/{package}', [PackageController::class, 'read'])->name('packages.read');
Route::get('/packages/location', [PackageController::class, 'showPackagesByLocation'])->name('packages.byLocation');

Route::get('route-planning', [MapController::class, 'showRoutePlanning'])->name('route.show');


Route::middleware('auth')->group(function(){
    Route::post('/review/store', [ReviewController::class, 'store'])->name('reviews.store');
    Route::post('/messages/store', [MessageController::class, 'store'])->name('messages.store');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/ordersesewa/esewa/{bookmarkid}', [OrderController::class, 'storeEsewa'])->name('order.storeEsewa');
    Route::get('/history', [OrderController::class, 'userHistory'])->name('historyindex');
    Route::post('/orders/{orderId}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');

    Route::get('/userprofile/edit', [UserProfileController::class, 'edit'])->name('userprofile.edit');
    Route::post('/userprofile/update', [UserProfileController::class, 'update'])->name('userprofile.update');

    Route::post('/bookmarks', [BookmarkController::class, 'store'])->name('bookmarks.store');
    Route::get('/bookmarks', [BookmarkController::class, 'myBookmarks'])->name('bookmarks.index');
    Route::delete('/bookmarks/{bookmark}', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy');
    Route::get('/bookmarks/{bookmark}/checkout', [BookmarkController::class, 'checkout'])->name('bookmarks.checkout');

});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'isadmin'])->name('dashboard');

Route::middleware(['auth','isadmin'])->group(function(){
    Route::get('/review', [ReviewController::class, 'index'])->name('reviews.index');
    Route::get('/review/{id}/destroy', [ReviewController::class, 'destroy'])->name('reviews.destroy');
    Route::get('/travellers',[TravellerController::class,'index'])->name('travellers.index');

    Route::get('/guides', [GuideController::class, 'index'])->name('guides.index');
    Route::get('/guides/create', [GuideController::class, 'create'])->name('guides.create');
    Route::post('/guides/store', [GuideController::class, 'store'])->name('guides.store');
    Route::get('/guides/{id}/edit', [GuideController::class, 'edit'])->name('guides.edit');
    Route::put('/guides/{id}/update', [GuideController::class, 'update'])->name('guides.update');
    Route::get('/guides/{id}/destroy', [GuideController::class, 'destroy'])->name('guides.destroy');

    Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
    Route::get('/packages/create', [PackageController::class, 'create'])->name('packages.create');
    Route::post('/packages/store', [PackageController::class, 'store'])->name('packages.store');
    Route::get('/packages/{id}/edit', [PackageController::class, 'edit'])->name('packages.edit');
    Route::put('/packages/{id}/update', [PackageController::class, 'update'])->name('packages.update');
    Route::get('/packages/{id}/destroy', [PackageController::class, 'destroy'])->name('packages.destroy');

    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}/{status}', [OrderController::class, 'status'])->name('orders.status');

    Route::get('admin/notifications', [NotificationController::class, 'showNotifications'])->name('admin.notifications');
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('markAsRead');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
