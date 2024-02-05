<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function check(Request $req){
        if(Auth::attempt($req->only('email','password'))){
            return redirect()->route('product-index')->with('success', 'Berhasil Login');
        }
        return back();
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
