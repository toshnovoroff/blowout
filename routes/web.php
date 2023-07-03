<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\LoyaltyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\DB;

Route::middleware('verified')->group(function () {
    // Routes that require email verification
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    // Route::post('/add-to-cart', 'ProductController@addToCart')->name('addToCart');
    Route::post('/products/{id}', [ProductController::class, 'addToCart'])->name('addToCart');
    Route::get('/loyalty', [LoyaltyController::class, 'index'])->name('loyalty');
    Route::get('/reviews', [ReviewController::class, 'index'])->middleware('auth')->name('reviews');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('storeReview')->middleware(['auth']);
    Route::get('/account', [AccountController::class, 'index'])->middleware('auth')->name('account');
    // Route::get('/booking', function () {
    //     return view('booking');
    // })->name('booking');
    Route::get('/booking', [BookingController::class, 'index'])->name('booking');
    Route::delete('/booking/{bookedProductId}', [BookingController::class, 'delete'])->name('booking.delete');
    Route::post('/booking', [BookingController::class, 'book_service'])->name('book_service');
    Route::get('/add-news', [NewsController::class, 'create'])->name('news.create')->middleware(['auth']);
    Route::post('/add-news', [NewsController::class, 'store'])->name('news.store')->middleware(['auth']);
    Route::get('/edit-news/{id}', [NewsController::class, 'edit'])->name('news.edit')->middleware(['auth']);
    Route::put('/update-news/{id}', [NewsController::class, 'update'])->name('news.update')->middleware(['auth']);
    Route::delete('/delete-news/{id}', [NewsController::class, 'destroy'])->name('news.destroy')->middleware(['auth']);
    Route::get('/products/search', [ProductController::class, 'search'])->name('products.search')->middleware(['auth']);
    Route::get('/products/filter', [ProductController::class, 'filter'])->name('filter')->middleware(['auth']);
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show')->middleware(['auth']);
    Route::post('/products', [ProductController::class, 'store'])->name('products.store')->middleware(['auth']);
    Route::post('/account/update', [AccountController::class, 'update'])->name('updateAccount');
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
    Route::get('/account/users-by-visit-count/{visitCount}', [AccountController::class, 'getUsersByVisitCount']);
    Route::get('/account/available-products', [AccountController::class, 'getAvailableProducts']);
    Route::get('/account/popular-services', 'AccountController@popularServices');
    Route::get('/account/total-revenue', 'AccountController@getTotalRevenue')->name('account.total-revenue');
    Route::get('/account/employees-with-service-count', [AccountController::class, 'getEmployeesWithServiceCount']);
    Route::get('/account/customers-with-contact-info', [AccountController::class, 'getCustomersWithContactInfo']);
    Route::get('/account/services', [AccountController::class, 'getServices']);
    Route::get('/account/masters', [AccountController::class, 'getMasters']);
    Route::get('/account/clients', [AccountController::class, 'getClientsByDate']);
    Route::get('/account/get-available-time-slots', [AccountController::class, 'getAvailableTimeSlots']);

});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['guest'])->group(function () {
    // Login and registration routes
    Auth::routes(['verify' => true]);
});

Route::get('/main', [NewsController::class, 'index'])->middleware('auth')->name('index');

Route::get('/verify', function () {
    return view('auth.verify');
});

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
