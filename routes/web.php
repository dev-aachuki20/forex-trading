<?php

use Illuminate\Support\Facades\Route;

// admin routes
Route::group(['middleware' => ['web', 'guest', 'preventBackHistory'], 'as' => 'auth.', 'prefix' => ''], function () {
    Route::view('admin/login', 'admin.auth.login')->name('admin.login');
    Route::view('admin/signup', 'admin.auth.register')->name('admin.register');
    Route::view('admin/forget-password', 'admin.auth.forget-password')->name('admin.forget-password');
    Route::view('admin/reset-password/{token}/{email}', 'admin.auth.password-reset')->name('admin.reset-password');

});

Route::group(['middleware' => ['auth', 'preventBackHistory', 'role:admin'], 'as' => 'auth.', 'prefix' => ''], function () {
    Route::view('admin/change-password', 'admin.auth.profile.change-password')->name('admin.change-password');
    Route::view('admin/profile', 'admin.auth.profile.index')->name('admin.profile_show');
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});




// Route::group(['middleware' => ['auth','web','role:admin'], 'as' => 'admin.', 'prefix' => 'admin'], function () {



// });

// Route::group(['middleware' => ['auth']], function () {

//     Route::view('admin/change-password', 'admin.auth.change-password')->name('auth.admin-change-password');
//     // Route::view('admin/logout', 'auth.logout')->name('auth.admin-logout');
//     // Route::get('admin/logout', Logout::class)->name('admin.logout');
//     // Route::view('admin/profile', 'auth.profile.index')->name('auth.admin-profile')->middleware('role:admin');
//     // Route::view('user/profile', 'auth.profile.index')->name('auth.user-profile')->middleware('role:user,role:ceo,role:management');
// });





Route::group(['middleware' => [], 'as' => 'front.', 'prefix' => ''], function () {

    Route::view('/', 'frontend.home')->name('home');
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
