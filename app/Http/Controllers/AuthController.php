<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Tampilkan form registrasi
    public function tampilRegistrasi()
    {
        return view('auth.registrasi');
    }

    // Proses registrasi sukses
    public function submitRegistrasi(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();
        // dd($user);
        return redirect()->route('login');

        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function tampilLogin()
    {
        return view('auth.login');
    }

    public function submitLogin(Request $request)
    {
        $data = $request->only('email','password');

        if (Auth::attempt()) {
            $request->session()->regenerate();
            // return redirect()->route('login.tampil');
            return redirect('/');
        } else {
            return redirect()->back()->with('gagal', 'Email atau password kamu salah');
        }
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autentikasi berhasil
            return redirect()->intended('/admin/dashboard'); // Redirect ke dashboard admin setelah login
        }

        // Autentikasi gagal
        return redirect()->back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/'); // Redirect ke halaman utama setelah logout
    }
}