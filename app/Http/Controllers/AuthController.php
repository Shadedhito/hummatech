<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            if ($request->ajax()) {
                return response()->json(['success' => true, 'redirect' => route('sanksi')]);
            }
            return redirect()->route('sanksi.index');
        }

        if ($request->ajax()) {
            return response()->json(['success' => false, 'message' => 'Email atau password salah'], 401);
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}