<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class AdminController extends Controller
// {
//     public function index()
//     {
//         return view('admin.dashboard');
//     }
// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.products');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}