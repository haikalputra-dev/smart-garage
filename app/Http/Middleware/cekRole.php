<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class cekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // if (!auth()->check()) {
        //     return redirect()->route('login')->with('error', 'Please log in to access this page.');
        // }

        // $user = auth()->user();

        // if ($user->role == 'Admin' || $user->role == 'Staff' || $user->role == 'Pengguna') {
        //     return $next($request);
        // }

        // return redirect()->route('login')->with('error', 'Please log in to access this page.');
        if (!Auth::check()) {
            return redirect()->guest('login')->with('error', 'Please log in to access this page.');
        }

        $user = Auth::user();

        if ($user->role !== $role) {
            return redirect()->route('login')->with('error', 'You do not have access to this page.');
        }

        return $next($request);
    }
}
