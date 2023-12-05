<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (auth()->check()) {
            if ($user->type == 'Admin' && $request->route()->getName() === 'auth.home') {
                return $next($request);
            } elseif ($user->type == 'Agent' && $request->route()->getName() === 'user.home') {
                return $next($request);
            } else {
                return redirect($user->type == 'Admin' ? route('auth.home') : route('user.home'));
            }
        } else {
            return redirect('/');
        }
    }
}
