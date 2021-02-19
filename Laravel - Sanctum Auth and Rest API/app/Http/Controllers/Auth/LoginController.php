<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthenticationException;

class LoginController extends Controller
{
    public function logout (Request $request) {
        $request->user()->currentAccessToken()->delete();
    }

    public function isLoggedIn() {
        return response(201);
    }

    public function login (Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (! $user || ! Hash::check($request->password, $user->password))
            return response([ 'message' => ['Invalid login'] ], 404);
    
        $response = [
            'user' => $user,
            'token' => $user->createToken($request)->plainTextToken
        ];
    
        return response($response, 201);
    }


    public function nuxtLogin(Request $request) {
        if (!auth()->attempt($request->only('email', 'password'))) {
            throw new AuthenticationException();
        } 
    }

    


}
