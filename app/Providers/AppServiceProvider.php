<?php

namespace App\Providers;

use App\Models\Language;
use App\Models\Localization;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // 
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($keys) {
            // $locale = App::getLocale('locale');
            $locale = session('locale', 'en');
            $localeid = Language::where('code', $locale)->value('id');

            $keys->with('localeid', Language::where('code', $locale)->value('id'));

            $keys->with('allKeysProvider', Localization::where('language_id', $localeid)->pluck('value', 'key')->toArray());

            $keys->with('locale', app()->getLocale());
        });
    }
}
