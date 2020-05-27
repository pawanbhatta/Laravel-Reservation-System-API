<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'fname'  =>  'required|max:55',
            'lname'  =>  'required|max:55',
            'email' =>  'required|email|unique:users',
            'password'  =>  'required|confirmed',
            'phone'  =>  'required|max:55',
            'address'  =>  'required|max:105',
            'is_admin'  =>  'required',
        ]);

        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        $accessToken = $user->createToken('AuthToken')->accessToken;

        return response(['user' => $user, 'AccessToken' => $accessToken]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' =>  'required|email',
            'password'  =>  'required',
        ]);

        if(!auth()->attempt($credentials)){
            return response(["Message" => "Invalid Credentials supplied"]);
        }
        
        $accessToken = auth()->user()->createToken('AuthToken')->accessToken;

        return response(['user' => auth()->user(), 'AccessToken' => $accessToken]);
        
    }
}