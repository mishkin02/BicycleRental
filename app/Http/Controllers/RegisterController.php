<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register (Request $request)
    {
        return view('register');
    }

    public function store(Request $request)
    {
       // dd($request);
        $validated = $request->validate([
            'first_name' => 'required|max:32',
            'last_name'=> 'required|max:32',
            'email'=> 'required|max:255',
            'phone_number'=> 'max:18',
            'password'=> 'required|max:255',
        ]);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'password' => bcrypt($validated['password'])
        ]);
        $user->save();
        return redirect('/bicycle');
    }
}
