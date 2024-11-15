<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Users extends Controller
{
    public function login(Request $request) {
        $email=$request->input('email');
        $password=$request->input('password');

        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required',
        ]);
        $user = User::where('email', $email)->first();
        if(!$user || !Hash::check($password,$password ? $user->password:'')){
            return response()->json([
                'message' => 'Nem létező email vagy jelszó',
            ], 401);
        }
        $user->tokens()->delete();
        $user->token = $user->createToken('acces')->plainTextToken;
        return response()->json([
            'user' => $user,
        ]);
    }

    public function index(){
        $user= User::all();
        return response()->json([
            'user' => $user,
        ]);

    }
}
