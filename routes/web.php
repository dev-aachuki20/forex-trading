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
    Route::view('admin/site-setting', 'admin.site-setting.index')->name('site-setting');
    Route::view('admin/courses', 'admin.courses.index')->name('courses');
    Route::view('admin/courses/content/{course_id}', 'admin.course-content.index')->name('content');
    Route::view('admin/lectures/{content_id}', 'admin.course-lectures.index')->name('lectures');

    Route::view('admin/affiliate', 'admin.affiliate.index')->name('affiliate');
    Route::view('admin/resources', 'admin.trader-resources.index')->name('resources');
    Route::view('admin/trading-contest', 'admin.trading-contest.index')->name('contest');
    Route::view('admin/trading-contest-rules/{contest_id}', 'admin.trading-contest-rule.index')->name('contest-rules');
    Route::view('admin/trading-contest-contestants/{contest_id}', 'admin.trading-contest-contestants.index')->name('contest-contestants');
    Route::view('admin/trading-contest-winner-places/{contest_id}', 'admin.trading-contest-winner-places.index')->name('contest-winner-places');

    Route::view('admin/newsletter', 'admin.trading-newsletter.index')->name('newsletter');
    Route::view('admin/contest-subscribers', 'admin.contest-subscriber.index')->name('contest-subscriber');
});


## Frontend Routes
Route::group(['middleware' => ['localization']], function () {
    Route::view('/', 'frontend.home')->name('home');
    Route::view('/learn-forex-trading', 'frontend.pages.learn-forex-trading')->name('learn-forex-trading');
    Route::view('/faq', 'frontend.pages.faq')->name('faq');
    Route::view('/affiliate', 'frontend.pages.affiliate')->name('affiliate');
    Route::view('/bk-forex-membership', 'frontend.pages.resources.bk-forex-membership')->name('bk-forex-membership');
    Route::view('/news', 'frontend.pages.resources.news')->name('news');
    Route::view('/traders-corner-blog', 'frontend.pages.resources.traders-corner-blog')->name('traders-corner-blog');
    Route::view('/traders-resources', 'frontend.pages.resources.traders-resources')->name('traders-resources');
    Route::view('/trading-contest', 'frontend.pages.resources.trading-contest')->name('trading-contest');
    Route::view('/get-funded', 'frontend.pages.how-funding-works.get-funded')->name('get-funded');
    Route::view('/scaling-plan', 'frontend.pages.how-funding-works.scaling-plan')->name('scaling-plan');
    Route::view('/surge-trader-audition', 'frontend.pages.how-funding-works.surge-trader-audition')->name('surge-trader-audition');
    Route::view('/technology', 'frontend.pages.how-funding-works.technology')->name('technology');
    Route::view('/tradable-assets', 'frontend.pages.how-funding-works.tradable-assets')->name('tradable-assets');
    Route::view('/trading-rules', 'frontend.pages.how-funding-works.trading-rules')->name('trading-rules');
    Route::view('/about-surgetrader', 'frontend.pages.aboutus.about-surgetrader')->name('about-surgetrader');
    Route::view('/contact-us', 'frontend.pages.aboutus.contact-us')->name('contact-us');
    Route::view('/our-founder', 'frontend.pages.aboutus.our-founder')->name('our-founder');
    Route::view('/surgetrader-team', 'frontend.pages.aboutus.surgetrader-team')->name('surgetrader-team');
    Route::view('/blogs/{slug}', 'frontend.pages.blog-detail')->name('blog-detail');
    Route::view('/news/{slug}', 'frontend.pages.news-detail')->name('news-detail');
    Route::view('/contest/{contest_id}/register', 'frontend.pages.resources.trading-contest')->name('contest-register');
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
