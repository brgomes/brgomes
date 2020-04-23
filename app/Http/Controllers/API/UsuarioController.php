<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public $successStatus = 200;

    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user 	= Auth::user();
            $token 	= $user->createToken('brgomes.com')->accessToken;

            return response()->json(['status' => 'success', 'token' => $token, 'user' => $user->toArray()], $this->successStatus);
        }

        return response()->json(['status' => 'error', 'message' => 'Combinação usuário e senha inválida.'], 401);
    }

    public function logout(Request $request)
    {
    	$request->user()->token()->revoke();

        return response()->json(['status' => 'success', 'message' => 'Sessão encerrada com sucesso.']);
    }

    public function me()
    {
        $user = Auth::user();

    	return response()->json(['status' => 'success', 'user' => $user], $this->successStatus);
    }
}
