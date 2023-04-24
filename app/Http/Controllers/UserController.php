<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        $title='Регистрация';
        return view('user.create',compact('title'));
    }
    public function store(Request $request)
    {
        $request->validate([
           'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed'
        ]);

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect()->home();
    }

    public function loginForm()
    {
        $title='Login';
        return view('user.login',compact('title'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if (Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ])){
            return redirect()->home();
        }

        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.create');
    }

}
