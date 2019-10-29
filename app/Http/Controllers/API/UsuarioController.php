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
            $user = Auth::user();

            $success['token'] = $user->createToken('brgomes.com')->accessToken;

            return response()->json(['success' => $success], $this->successStatus);
        }

        return response()->json(['error' => 'Unauthorised'], 401);
    }

    public function logout(Request $request)
    {
    	$request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function details()
    {
        $user = Auth::user();

    	return response()->json(['success' => $user], $this->successStatus);
    }
}
