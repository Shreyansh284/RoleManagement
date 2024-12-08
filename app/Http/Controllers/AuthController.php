<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Hash;

class AuthController extends Controller
{
    public function login(Request $request)    
    {
        
        if(!empty(Auth::check()))
        {
            return redirect("panel/dashboard");
        }
        return view ('auth.login');
    }
    public function auth_login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect("panel/dashboard");
        }
        else
        {
            return redirect()->back()->with('error',"Please enter currect email and password");
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}
