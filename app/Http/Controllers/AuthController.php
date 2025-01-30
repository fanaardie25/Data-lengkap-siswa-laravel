<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function tampilregister(){
        return view('user.register');
    }

    public function submitRegister(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',


        ],[
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email harus berformat email',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];

        User::create($data);

        return redirect()->route('login')->with('success','anda berhasil registrasi,silakan login kembali');
    }

    public function tampilLogin(){
        return view('user.login');
    }

    public function submitLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            ],[
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Email harus berformat email',
                'password.required' => 'Password wajib diisi',
                ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->route('siswa.index')->with('success','anda berhasil login');
        }else{
            return redirect()->back()->withErrors('Email atau Password salah');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('welcome')->with('success','anda berhasil logout');
    }
}
