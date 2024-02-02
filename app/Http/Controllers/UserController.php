<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register() {
        $data['title'] = 'Daftar';
        return view('user/register', $data);
    }
    
    public function register_action(Request $request) {
        $request->validate([
            'nama'=> 'required',
            'username'=> 'required|unique:users',
            'password'=> 'required',
            'confirm_pass'=> 'required|same:password',
        ]);

        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login')->with('success', 'Pendaftaran Berhasil, Silahkan Masuk!');
    }

    public function login() {
        $data['title'] = 'Masuk';
        return view('user/login', $data);
    }

    public function login_action(Request $request) {
        $request->validate([
            'username'=> 'required',
            'password'=> 'required'
        ]);

        if(Auth::attempt(['username' => $request->username,'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/dasbor');
        }
        return back()->withErrors(['username' => 'Username atau Password salah!']);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
