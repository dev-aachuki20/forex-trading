<?php

use Illuminate\Support\Facades\Route;

// admin routes before authentication 
Route::group(['middleware' => ['prevent_admin_login'], 'as' => 'auth.', 'prefix' => ''], function () {
    Route::view('admin/login', 'admin.auth.login')->name('admin.login');
    Route::view('admin/signup', 'admin.auth.register')->name('admin.register');
    Route::view('admin/forget-password', 'admin.auth.forget-password')->name('admin.forget-password');
    Route::view('admin/reset-password/{token}/{email}', 'admin.auth.password-reset')->name('admin.reset-password');
});

// admin routes after authentication 
Route::group(['middleware' => ['auth', 'preventBackHistory', 'role:admin'], 'as' => 'auth.', 'prefix' => ''], function () {
    Route::view('admin/change-password', 'admin.auth.profile.change-password')->name('admin.change-password');
    Route::view('admin/profile', 'admin.auth.profile.index')->name('admin.profile_show');
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::view('admin/language', 'admin.language.index')->name('language');
    Route::view('admin/localization', 'admin.localization.index')->name('localization');
    Route::view('admin/faq', 'admin.faq.index')->name('faq');
    Route::view('admin/gallery', 'admin.gallery.index')->name('gallery');

    Route::view('testimonials', 'admin.testimonial.index')->name('testimonial');
    Route::view('page-manage', 'admin.page.index')->name('page');
    Route::view('blog-manage', 'admin.blog.index')->name('blog');
    Route::view('partner-logo-manage', 'admin.partner-logo.index')->name('partner-logo');
    Route::view('package-manage', 'admin.package-manager.index')->name('package');
});

Route::group(['middleware' => [], 'as' => 'front.', 'prefix' => ''], function () {
    Route::view('/', 'frontend.home')->name('home');
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
