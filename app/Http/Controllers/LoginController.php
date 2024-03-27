<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        //dd($request);
        $credentials = $request->validate([
            "email"=> ["required","email"],
            "password"=> ["required"],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('login');
        }
        return back()->withErrors(['email'=> 'The provided credentials do not match our records.',
    ])->onlyInput('email', 'password');
    }
    
    public function login(Request $request)
    {
        return view('login', [
            'user' => Auth::user(),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
