<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return to_route('login');
        }

        if (Auth::user()->role === $role) {
            return $next($request);
        }

        // Redirect users based on their role if unauthorized
        return match (Auth::user()->role) {
            'admin' => to_route('admin.dashboard'),
            'seller' => to_route('seller.dashboard'),
            'buyer' => to_route('home'),
            default => abort(403, 'Unauthorized action.'),
        };
    }
}
