<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminPropertyController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\UserBookingController;
use App\Http\Controllers\AdminDashboardController;

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('users', UserController::class);

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::get('properties/create', [AdminPropertyController::class, 'create'])->name('admin.properties.create');
Route::get('home', [PropertyController::class, 'index'])->name('users.properties.index');
Route::get('/property/{id}', [PropertyController::class, 'show'])->name('users.property.show');
Route::get('/properties/filter', [PropertyController::class, 'filterByLocation'])->name('property.filter'); 
Route::get('/properties', [PropertyController::class, 'index'])->name('users.property.index');
Route::post('/property/book/{id}', [PropertyController::class, 'book'])->name('users.property.book');
Route::get('/admin/properties/{id}', [AdminPropertyController::class, 'show'])->name('admin.properties.show');

Route::get('bookings', [UserBookingController::class, 'index'])->name('user_bookings')->middleware('auth');


Route::prefix('admin')->group(function () {
    // Properties Routes
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard.index');
    Route::get('/', [AdminPropertyController::class, 'index'])->name('admin.properties.index');
    Route::post('properties', [AdminPropertyController::class, 'store'])->name('admin.properties.store');
    Route::get('properties/{id}', [AdminPropertyController::class, 'show'])->name('admin.properties.show');
    Route::get('properties/{id}/edit', [AdminPropertyController::class, 'edit'])->name('admin.properties.edit');
    Route::put('properties/{id}', [AdminPropertyController::class, 'update'])->name('admin.properties.update');
    Route::delete('properties/{id}', [AdminPropertyController::class, 'destroy'])->name('admin.properties.destroy');

     // Bookings Routes
     
     Route::get('bookings', [AdminBookingController::class, 'index'])->name('admin.bookings.index');
     Route::patch('bookings/{id}/status', [AdminBookingController::class, 'updateStatus'])->name('admin.bookings.updateStatus');
 });
