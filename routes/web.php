<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// User Profile Route
Route::prefix('profile')->group(function () {
    Route::get('/', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::post('/', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

// Marketplace Route
Route::prefix('marketplace')->group(function () {
    Route::get('/', [App\Http\Controllers\MarketplaceController::class, 'index'])->name('marketplace.index');
    Route::get('cari', [App\Http\Controllers\MarketplaceController::class, 'search'])->name('marketplace.search_result');
});

Route::prefix('cart')->group(function () {
    Route::get('/', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::get('/{id}', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store_item');
    Route::get('/delete/{id}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.delete_item');
    Route::post('bayar', [App\Http\Controllers\CartController::class, 'update'])->name('cart.testing');
});

Route::prefix('payment')->group(function () {
    Route::get('/', [App\Http\Controllers\PaymentController::class, 'index'])->name('payment.index');
    Route::post('/', [App\Http\Controllers\PaymentController::class, 'store'])->name('payment.store');
});

// Publisher Route Group
Route::prefix('publish')->group(function () {
    Route::view('/', 'publish.index')->name('publish.index');
    Route::get('dashboard', [App\Http\Controllers\PublishController::class, 'dashboard'])->name('publish.user_dashboard');

    // Publisher Incoming Order Route Group
    Route::prefix('order')->group(function () {
        // Show Publisher's Incoming Order Page
        Route::get('/', [App\Http\Controllers\PublishController::class, 'orderList'])->name('publish.user_order_list');
        Route::get('/edit/{id}', [App\Http\Controllers\PublishController::class, 'orderShow'])->name('publish.user_show_order');
        Route::post('/update/{id}', [App\Http\Controllers\PublishController::class, 'orderUpdate'])->name('publish.user_update_order');

    });

    // Publisher Website Route Group
    Route::prefix('website')->group(function () {
        // Show Publisher's Website List Page
        Route::get('/', [App\Http\Controllers\WebsiteController::class, 'index'])->name('publish.user_website_list');
        // Show Publisher's Add Website Page
        Route::get('add-website', [App\Http\Controllers\WebsiteController::class, 'create'])->name('publish.user_add_website');
        // Publisher's Store Website
        Route::post('add-website', [App\Http\Controllers\WebsiteController::class, 'store'])->name('publish.user_store_website');
        // Publisher's Edit Website
        Route::get('edit/{id}', [App\Http\Controllers\WebsiteController::class, 'edit'])->name('publish.user_edit_website');
        Route::post('/edit', [App\Http\Controllers\WebsiteController::class, 'update'])->name('publish.user_update_website');
    });

    // Publisher Withdrawal Route Group
    Route::prefix('withdraw')->group(function () {
        Route::get('/', [App\Http\Controllers\WithdrawController::class, 'index'])->name('publisher.user_withdraw_index');
        Route::post('/', [App\Http\Controllers\WithdrawController::class, 'store'])->name('publisher.user_withdraw_store');
    });
});

// Buyer Route Group
Route::prefix('buyer')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\BuyerController::class, 'dashboard'])->name('buyer.user_dashboard');

    // Buyer Order Route Group
    Route::prefix('order')->group(function () {
        Route::get('/', [App\Http\Controllers\BuyerController::class, 'orderList'])->name('buyer.user_order_list');
        Route::get('/details/{id}', [App\Http\Controllers\BuyerController::class, 'orderDetails'])->name('buyer.user_order_details');
    });

    // Buyer Balace Deposit Group
    Route::prefix('deposit')->group(function () {
        Route::get('/', [App\Http\Controllers\DepositController::class, 'index'])->name('buyer.user_deposit_index');
        Route::post('/', [App\Http\Controllers\DepositController::class, 'store'])->name('buyer.user_deposit_store');
        Route::get('show/{id}', [App\Http\Controllers\DepositController::class, 'show'])->name('buyer.user_deposit_show');
        Route::post('/update', [App\Http\Controllers\DepositController::class, 'update'])->name('buyer.user_deposit_update');
    });
});

Route::prefix('info')->group(function () {
    Route::view('contact', 'info.contact')->name('info.contact');
    // Website Info Details
    Route::get('website/{id}', [App\Http\Controllers\WebsiteController::class, 'show'])->name('info.website_details');
});

