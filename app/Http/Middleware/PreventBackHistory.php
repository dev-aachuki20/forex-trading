<?php

namespace App\Http\Middleware;

// use Illuminate\Auth\Middleware\Authenticate as Middleware;
// use Illuminate\Http\Request;
use Closure;

class PreventBackHistory
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle($request, Closure $next)
    {
        $headers = [
        'Cache-Control'      => 'nocache, no-store, max-age=0, must-revalidate',
        'Pragma'     => 'no-cache',
        'Expires' => 'Sun, 02 Jan 1990 00:00:00 GMT'
        ];
        $response = $next($request);
        foreach($headers as $key => $value) {
            $response->headers->set($key, $value);
        }
 
        return $response;            
    }
}
