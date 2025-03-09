<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController 
{
    public function showLoginForm()
    {
        return view('auth.login'); 
        
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('users.index')->with('success', 'Logged in successfully!');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function register_view()
    {
        return view('auth.register');
    }
     public function register(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users|max:255',
                'password' => 'required|string|confirmed|min:6',
                'role' => 'required|string|in:staff,doctor',
            ]);
            User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password')),
                'role' => $request->get('role'),
            ]);
            if(\Auth::attempt($request->only('email','password',)))
            
                return redirect('user.index')->with('success', 'User registered and logged in successfully!');
            
        }
        public function showDashboard()
        {
            if (Auth::check()) {
                return view('dashboard'); 
            }
            return redirect('login')->with('error', 'You must be logged in to access the dashboard.');
        }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login')->with('success', 'Logged out successfully!');
    }
   
}
