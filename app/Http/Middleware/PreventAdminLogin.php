<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class PreventAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Check if the user has the "admin" role
            if (Auth::user()->hasRole('admin')) {
                return redirect()->route('auth.admin.dashboard'); // Redirect admin to the admin dashboard
            }
        }

        // If the user is not authenticated or is not an admin, allow them to proceed to the login page
        return $next($request);
    }
}
