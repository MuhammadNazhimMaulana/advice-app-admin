<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Hash, Auth};
use App\Http\Requests\Auth\Login;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        $data = [
            "title" => "Login",
        ];

        return view('Auth/login_view', $data);  
    }

    // Login Process
    public function process_login(Login $request)
    {
        $pengguna = User::where('username', $request->username)->first();

        $loginData = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($loginData)) {
            $request->session()->regenerate();

            // Store data in session
            $request->session()->put('pengguna', [$pengguna->name, $pengguna->username, $pengguna->id]);

            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Gagal');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

}
