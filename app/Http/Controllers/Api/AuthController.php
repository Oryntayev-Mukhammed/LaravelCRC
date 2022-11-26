<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use phpseclib3\File\ASN1\Maps\FieldID;

class AuthController extends Controller
{
    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'Bad credentials',
            ], 401);
        }

        $token = $user->createToken('mytoken')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token,
        ], 201);

    }

    public function register(Request $request){
        $fields = $request->validate([
           'name' => 'required',
           'email' => 'required|email|unique:users,email',
           'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('mytoken')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();

        return['message' => 'logged out'];
    }
}
