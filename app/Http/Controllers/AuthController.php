<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($credentials)) {

            if (auth()->user()->role !== ADMIN_ROLE) {
                Auth::logout();

                Alert::toast('You are not authorized as admin', 'error');
                return back();
            }

            $request->session()->regenerate();

            Alert::toast('Login Successfully', 'success');

            return redirect()->route('admin.dashboard');
        }

        Alert::toast('Invalid email or password', 'error');
        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Alert::toast('Logged out successfully', 'success');

        return redirect()->route('login');
    }
}
