<?php

namespace App\Http\Middleware;

use App\Models\Language;
use App\Models\Localization;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LocalMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // if (Session::has('locale')) {
        //     $locale = Session::get('locale') ?? 'en';

        //     $localeid = Language::where('code', $locale)->value('id');
        //     $allKeysProvider = Localization::where('language_id', $localeid)->pluck('value', 'key')->toArray();

        //     // dd($allKeysProvider);

        //     $request->merge([
        //         'locale' => $locale,
        //         'localeid' => $localeid,
        //         'allKeysProvider' => $allKeysProvider,
        //     ]);

        //     view()->share(['allKeysProvider' => $allKeysProvider, 'locale' => $locale, 'localeid' => $localeid]);

        //     Session::put(['allKeysProvider', $allKeysProvider]);
        //     Session::put('locale', $locale);
        //     Session::put('localeid', $localeid);
        // }
        return $next($request);
    }
}
