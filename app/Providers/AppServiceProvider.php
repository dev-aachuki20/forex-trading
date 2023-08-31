<?php

namespace App\Providers;

use App\Models\Language;
use App\Models\Localization;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

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
        if (Schema::hasTable('languages')) {
            $locale = Cache::get('locale') ?? 'en';
            $localeid = Language::where('code', $locale)->value('id');
            $allKeysProvider = Localization::where('language_id', $localeid)->pluck('value', 'key')->toArray();
            // session()->put('active_tab', $localeid);
            view()->share(['allKeysProvider' => $allKeysProvider, 'locale' => $locale, 'localeid' => $localeid]);
            $this->app->instance('localeid', $localeid);
        }
    }
}
