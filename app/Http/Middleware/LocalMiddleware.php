<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // $locale = $request->segment(1);
        // $supportedLocales = ['en', 'ja', 'th'];

        // if (!in_array($locale, $supportedLocales)) {
        //     $locale = config('app.locale'); // Set default locale if not in supported languages
        //     // Redirect to the URL with the language code
        //     return redirect()->to("/$locale" . $request->getPathInfo());
        // }
        // App::setLocale($locale);
        // Session::put('locale', $locale);

        // return $next($request);


        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        }
        return $next($request);
    }
}
