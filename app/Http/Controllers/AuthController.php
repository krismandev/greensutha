<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function login()
  {
    return view('auth.login');
  }

  public function postlogin(Request $request){
      $request->validate([
        'email' => 'required',
        'password' => 'required'
      ]);
      if (Auth::attempt($request->only('email','password'))) {
        return redirect()->route('index_admin');
      }else{
      return redirect()->back()->with('error','Password salah. perikas kembali Email dan Password anda.');
      }
  }
}
