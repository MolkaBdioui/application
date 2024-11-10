<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }

    public function login(){
        return view('login');
    }

    public function auth(Request $request){
        $inputs = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(Auth::attempt($inputs)){
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login')->withErrors(['email'=>'Incorrect Credentials']);
        }
    }

    public function accounts()
    {

    }
}
