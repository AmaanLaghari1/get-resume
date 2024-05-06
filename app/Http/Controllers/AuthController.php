<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function signupView(){
        return view('index');
    }

    public function loginView(){
        return view('login');
    }

    public function signup(Request $req){
        // dd($req->all());

        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $newUser = new User();

        $newUser->name = $req->name;
        $newUser->email = $req->email;
        $newUser->password = $req->password;
        $newUser->save();


        return back()->withSuccess('Account Created Successfully...');
    }

    public function login(Request $req){
        $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($req->only('email', 'password'))){
            return redirect('/home');
        }

        return redirect()->back()->withError('Login Failed!');
    }

    public function loggedout(){
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}
