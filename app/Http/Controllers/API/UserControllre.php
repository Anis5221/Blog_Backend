<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Exception\MissingInputException;

class UserControllre extends Controller
{
    public function currentUser () {
        return Auth::user();
    }

    public function register(Request $request) {

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
        ]);

        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ];
        try {
            User::create($user);
            return response()->json([
                'message' => 'success'
            ]);
        } catch (MissingInputException $ex) {
            return response()->json([
                'error' => 'Somthing missing',
                'exception' => $ex
            ]);
        }

    }
}
