<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Marketplace Route
Route::prefix('marketplace')->group(function () {
    Route::view('/', 'marketplace.index')->name('marketplace.index');
    Route::view('cart', 'marketplace.cart')->name('marketplace.cart');
    Route::view('cari', 'marketplace.search-result')->name('marketplace.search_result');
});

// Publisher Route Group
Route::prefix('publish')->group(function () {
    Route::view('/', 'publish.index')->name('publish.index');
    Route::view('dashboard', 'publish.panel.dashboard')->name('publish.user_dashboard');
    Route::view('website', 'publish.panel.website-list')->name('publish.user_website_list');
    Route::view('order', 'publish.panel.order-list')->name('publish.user_order_list');
    Route::view('add-website', 'publish.panel.add-website')->name('publish.user_add_website');
});

// Buyer Route Group
Route::prefix('buyer')->group(function () {
    Route::view('/dashboard', 'buyer.dashboard')->name('buyer.user_dashboard');
    Route::view('/order', 'buyer.order')->name('buyer.user_order');
});

Route::prefix('info')->group(function () {
    Route::view('contact', 'info.contact')->name('info.contact');
});
