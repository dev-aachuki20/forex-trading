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

    ## modules 
    Route::view('admin/language', 'admin.language.index')->name('language');
    Route::view('admin/localization', 'admin.localization.index')->name('localization');
    Route::view('admin/faq', 'admin.faq.index')->name('faq');
    Route::view('admin/gallery', 'admin.gallery.index')->name('gallery');
    Route::view('admin/testimonial', 'admin.testimonial.index')->name('testimonial');
    Route::view('admin/page-manage', 'admin.page.index')->name('page');
    Route::view('admin/blog-manage', 'admin.blog.index')->name('blog');
    Route::view('admin/partner-logos', 'admin.partner-logo.index')->name('partner-logo');
    Route::view('admin/package-manage', 'admin.package-manager.index')->name('package');
    Route::view('admin/news-manage', 'admin.news.index')->name('news');
    Route::view('admin/team-manage', 'admin.team.index')->name('team');
    Route::view('admin/include-manage', 'admin.include-manager.index')->name('include');
    Route::view('admin/glance', 'admin.glance.index')->name('glance');
    Route::view('admin/featured-manage', 'admin.featured-manage.index')->name('featured');
    Route::view('admin/why-trade-with-us', 'admin.why-trade-with-us.index')->name('whytrade');
    Route::view('admin/setting', 'admin.setting.index')->name('setting');
});


## Frontend Routes
Route::group(['middleware' => [], 'as' => 'front.', 'prefix' => ''], function () {
    Route::view('/', 'frontend.home')->name('home');
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
