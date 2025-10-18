<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:admin,employee',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role !== $request->role) {
                Auth::logout();
                return back()->withErrors(['role' => 'Role mismatch!']);
                }

    
            if ($user->role === 'admin') {
                return redirect()->route('employees.index')->with('success', 'Welcome Admin!');
            } else {
                return redirect()->route('employees.empindex')->with('success', 'Welcome Employee!');
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
