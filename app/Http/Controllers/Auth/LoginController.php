<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'auth/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('IsActive');
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'userName';
    }

    protected function attemptLogin(Request $request)
    {

        $credentials = $this->credentials($request);
        // Check if middleware redirected with error
        if ($errors = $request->session()->get('errors')) {
            return back()->withErrors($errors);
        }

        // Attempt login with default logic
        return Auth::attempt($credentials, $request->filled('remember'));
    }
}
