<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('Auth/login');
    }

    public function register()
    {
        return view('Auth/register');
    }

    public function forgotPassword()
    {
        return view('Auth/forgot-password');
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email|unique:users,email,',
            'password' => 'required|max:20|min:6',
            'terms' => 'required'
        ]);

        $sql = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'terms' => $request->terms
        ]);
        if ($sql) {
            return redirect()->route('login')->with('success', 'Account Created Successfully.');
        } else {
            return redirect()->back()->with('error', 'Error in createing Account.');
        }
    }

    public function loginUser(Request $request)
    {
        
    }
}
