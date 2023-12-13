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
            // check if the user is admin
            if ($user->type == 'Admin') {
                $allowedAdminRoutes = [
                    'users.index', 'users.create', 'users.store', 'users.show', 'users.edit', 'users.update', 'users.destroy',
                    'traders.index', 'traders.create', 'traders.store', 'traders.show', 'traders.edit', 'traders.update', 'traders.destroy',
                    'comments.index', 'comments.create', 'comments.store', 'comments.show', 'comments.edit', 'comments.update', 'comments.destroy'
                ];
                // check if the requested route is allowed for admin
                if (in_array($request->route()->getName(), $allowedAdminRoutes)) {
                    return $next($request);
                } elseif ($request->route()->getName() != 'auth.home') {
                    return redirect(route('auth.home'));
                }
            } // check if the user is agent
            elseif ($user->type == 'Agent') {
                $allowedUserRoutes = ['user.home', 'users.show', 'users.edit', 'users.update'];
                //  check if the requested route is allowed for agents
                if (in_array($request->route()->getName(), $allowedUserRoutes)) {
                    return $next($request);
                } elseif (!in_array($request->route()->getName(), $allowedUserRoutes)) {
                    return redirect(route('user.home'));
                }
            } else {
                return redirect($user->type == 'Admin' ? route('auth.home') : route('user.home'));
            }
        } else {
            return redirect('auth.home');
        }
        return
            $next($request);
    }
}
