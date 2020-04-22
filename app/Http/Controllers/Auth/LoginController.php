<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Sistema\Usuario;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Where to redirect users after login.
    protected $redirectTo = '/sistema';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            $credentials = $request->only(['email', 'password']);

            if ($response = apiRequest('POST', 'login', ['form_params' => $credentials])) {
                if ($response->status === 'error') {
                    return redirect()->back()->withErrors(['email' => 'Usuário e/ou senha inválidos.']);
                }

                $user = Usuario::find($response->user->id);

                Auth::login($user);

                $user->access_token = $response->token;
                $user->save();
            }
        }

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            apiRequest('GET', 'logout');

            //$user->logout();

            Auth::logout();
            Session::flush();
        }

        return redirect($this->redirectTo);
    }
}
