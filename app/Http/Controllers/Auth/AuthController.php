<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('auth/login');  
    }
    public function daftar(){
        return view('auth/register');
    }
    public function login(LoginRequest $r){
        if ($r->validated()) {
            if (Auth::guard('web')->attempt([
                'email' => $r->email,
                'password' => $r->password
            ])) {
                return redirect('admin')->with('pesan','Login Berhasil');
            }else{
                return back()->with('pesan','Login Gagal');
            }
        }

    }
    public function register(RegisterRequest $r){
        if ($r->validated()) {
            User::create([
                    'name' => $r->name,
                    'email' => $r->email,
                    'password' => Hash::make($r->password)
                ]);
                return redirect('/')->with('pesan', 'register berhasil');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
