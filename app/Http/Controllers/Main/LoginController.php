<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function loginPage(){
        return view('Main.login.login');
    }

    public function doLogin(Request $request){        
        $auth = Auth::attempt(
            [
                'email'=>$request->email_ng,
                'password'=>$request->password_ng,
            ]
        );
        
        if($auth){
            // In this Part you can add Data to session
            //dd(Auth::user());
            return redirect()->route('Admin_Dashboard');
        }
        else{
            return(redirect()->back());
        } 
    }

    public function logOut(){
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('Login');
        }
        return redirect('/');
    }
}
