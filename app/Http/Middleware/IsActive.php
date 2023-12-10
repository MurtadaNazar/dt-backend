<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class IsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            // Use the credentials method
            $credentials = $this->credentials($request);

            // Check user status before attempting login
            $user = User::where($credentials)->first();
            if (!$user || $user->status == '0') {
                Auth::logout();
                return redirect()->route('login')->withErrors(['message' => 'Your account is inactive. Please contact support.']);
            }
        }

        return $next($request);
    }


    public function credentials(Request $request)
    {
        // Extract credentials from the request
        return $request->only('userName');
    }
}
