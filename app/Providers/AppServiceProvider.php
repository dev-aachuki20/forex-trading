<?php

namespace App\Providers;

use App\Models\Language;
use App\Models\Localization;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Livewire\Livewire;

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
        $locale = Cache::get('locale') ?? 'en';

        $languageId = Language::where('code', $locale)->value('id');

        if (App::isLocale('en')) {
            $allKeysProvider = Localization::where('language_id', $languageId)->pluck('value', 'key')->toArray();
        } elseif (App::isLocale('jp')) {
            $allKeysProvider = Localization::where('language_id', $languageId)->pluck('value', 'key')->toArray();
        } elseif (App::isLocale('thai')) {
            $allKeysProvider = Localization::where('language_id', $languageId)->pluck('value', 'key')->toArray();
        }

        view()->share('allKeysProvider', $allKeysProvider);
    }
}
