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
            'username'=> 'required|unique:tb_user',
            'password'=> 'required',
            'confirm_pass'=> 'required|same:password',
        ]);

        $user = new User([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);
        $user->save();
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

    public function password() {
        $data['title'] = 'Ganti Password';
        return view('user/password', $data);
    }

    public function password_action(Request $request) {
        $request->validate([
            'username'=> 'required',
            'password'=> 'required'
        ]);

        if(Auth::attempt(['username' => $request->username,'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }
        return back()->withErrors('password', 'Username atau Password salah!');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
