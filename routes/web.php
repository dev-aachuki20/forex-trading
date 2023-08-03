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
});

Route::group(['middleware' => [], 'as' => 'front.', 'prefix' => ''], function () {
    Route::view('/', 'frontend.home')->name('home');
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
