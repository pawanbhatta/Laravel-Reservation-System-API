<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'userLogout');
        // $this->middleware('guest:admin')->except('logout');
        // $this->middleware('guest:web')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'     =>  'required|email',
            'password'  =>  'required|min:6'
        ]);

        $credentials = [
            'email'     =>  $request->email,
            'password'  =>  $request->password,
        ];
        
        if(Auth::guard('admin')->attempt($credentials, $request->remember))
        {
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}