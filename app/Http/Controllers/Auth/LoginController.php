<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Where to redirect users after login.
    protected $redirectTo = '/sistema';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            //$user->logout();

            Auth::logout();
            Session::flush();
        }

        return redirect($this->redirectTo);
    }
}
