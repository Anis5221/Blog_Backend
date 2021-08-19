<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request) {

        // $credential = $request->only('email', 'password');

        if( Auth::attempt(['email' => $request->email, 'password' => $request->password]) ) {
            $request->session()->regenerate();
            $token = $request->user()->createToken('mytoken');
            return response()->json([
                'token' => $token->plainTextToken,
            ], 201);
        }else{
            return response()->json([
                'message' => 'Credential not match!'
            ], 401);
        }

    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(null, 200);
    }
}
