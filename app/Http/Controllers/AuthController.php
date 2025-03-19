<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        /*echo Hash::make(5555);
        die;
        */
        return view('auth.login');
    }

    public function auth_login(Request $request){
        //dd($request->all());
        if(Auth::attempt(['email' => $request->email, 'password' =>$request->password], true)){
            return redirect('panel/dashboard');
        }
        else
        {
            return redirect()->back()->with('error', "Inserir credenciais válidas");
        }
    }

    public function forgot(){
        return view('auth.forgot');
    }
    public function logout(){
        Auth::logout();
        return redirect(url(''));
    }
}
