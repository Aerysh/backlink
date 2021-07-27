<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Marketplace Route
Route::prefix('marketplace')->group(function () {
    Route::get('/', [App\Http\Controllers\MarketplaceController::class, 'index'])->name('marketplace.index');
    Route::view('cart', 'marketplace.cart')->name('marketplace.cart');
    Route::view('cari', 'marketplace.search-result')->name('marketplace.search_result');
});

// Publisher Route Group
Route::prefix('publish')->group(function () {
    Route::view('/', 'publish.index')->name('publish.index');
    Route::get('dashboard', [App\Http\Controllers\PublishController::class, 'dashboard'])->name('publish.user_dashboard');

    // Publisher Incoming Order Route Group
    Route::prefix('order')->group(function () {
        // Show Publisher's Incoming Order Page
        Route::get('/', [App\Http\Controllers\PublishController::class, 'orderList'])->name('publish.user_order_list');

    });

    // Website Route Group
    Route::prefix('website')->group(function () {
        // Show Publisher's Website List Page
        Route::get('/', [App\Http\Controllers\WebsiteController::class, 'index'])->name('publish.user_website_list');
        // Show Publisher's Add Website Page
        Route::get('add-website', [App\Http\Controllers\WebsiteController::class, 'create'])->name('publish.user_add_website');
        // Publisher's Store Website
        Route::post('add-website', [App\Http\Controllers\WebsiteController::class, 'store'])->name('publish.user_store_website');
        // Publisher's Edit Website
        // Edit Website Under Construction Due To Other User Can Edit Website That Don't Belong To Them
        Route::get('edit/{id}', [App\Http\Controllers\WebsiteController::class, 'edit'])->name('publish.user_edit_website');

    });
});

// Buyer Route Group
Route::prefix('buyer')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\BuyerController::class, 'dashboard'])->name('buyer.user_dashboard');

    // Buyer Order Route Group
    Route::prefix('order')->group(function () {
        Route::get('/', [App\Http\Controllers\BuyerController::class, 'orderList'])->name('buyer.user_order_list');
    });
});

Route::prefix('info')->group(function () {
    Route::view('contact', 'info.contact')->name('info.contact');
});

Route::view('websiteDetails', 'info.website-details'); // Sementara

