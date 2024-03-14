<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        if (Auth::check()) {
            return redirect('home');
        } else {
            return view('login');
        }
    }

    public function loginProcess(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('/')->with('client', 'Selamat datang di perpustakaan Wibu');
        }

        // if (Auth::Attempt($data)) {
        //     return redirect('/')->with('client', 'Selamat datang di perpustakaan Wibu');
        // } else {
        //     return redirect('login')->with('failed', 'Username / Password Tidak Valid');
        // }
    }

    public function register(){
        return view('register');
    }

    public function registerProcess(Request $request){
        $data = [
            'email'=> $request->input('email'),
            'name'=> $request->input('name'),
            'password'=> Hash::make($request->input('password')),
        ];

        User::create($data);
        return redirect('login')->with('berhasil', 'AKUN BERHASIL DIBUAT! SILAHKAN LOGIN!');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        return redirect('/login');
    }


}
