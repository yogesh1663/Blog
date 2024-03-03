<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

        $token = Str::random(20);
        $sql = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'terms' => $request->terms,
            'remember_token' => $token
        ]);
        if ($sql) {
            Mail::to($request->email)->send(new RegisterMail($request->name, $token));
            return redirect()->route('login')->with('success', 'Account Created Successfully. Please vertify your Email');
        } else {
            return redirect()->back()->with('error', 'Error in createing Account.');
        }
    }

    public function verify($token)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if (!empty($user)) {
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->save();
            return redirect()->route('login')->with('success', 'Account Verified Successfully');
        } else {
            abort(404);
        }
    }
    public function loginUser(Request $request)
    {
    }
}
