<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = Auth::attempt($credentials)) { // corrigido
            return response()->json(['error' => 'Email ou senha inválidos'], 401);
        }

        return response()->json([
            'token' => $token,
            'user' => Auth::user(), // corrigido
        ]);
    }

    public function logout()
    {
        Auth::logout(); // corrigido

        return response()->json(['message' => 'Logout realizado com sucesso']);
    }

    public function me()
    {
        return response()->json(Auth::user()); // corrigido
    }
}
