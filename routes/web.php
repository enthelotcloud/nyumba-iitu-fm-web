<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/faqs', 'faqs')->name('faqs');
Route::view('/terms-of-service', 'terms-of-service')->name('terms-of-service');
Route::view('/privacy-policy', 'privacy-policy')->name('privacy-policy');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
