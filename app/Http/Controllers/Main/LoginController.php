<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function loginPage(){
        $login = "";
        return view('Main.login.Login',compact("login"));
    }

    // validation for login
    public function doLogin(Request $request){   
        $this->validate($request,[
            'email_ng' => 'required|email',
            'password_ng' => 'required',
            'captcha_ng' => 'required|captcha'
        ]);

        $auth = Auth::attempt(
            [
                'email'=>$request->email_ng,
                'password'=>$request->password_ng,
            ]
        );
        
        if($auth){
            // get user Information
            $User = Auth::user();
            // admin 
            if($User->role == 1){
                return redirect()->route('Admin_Dashboard');
            }
            // general user
            return redirect()->route('Home');
        }
        else{
            // not Auth
            return(redirect()->back()->with('danger','نام کاربری یا گذرواژه اشتباه است'));
        } 
    }

    // log out function
    public function logOut(){
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('Login');
        }
        return redirect('/');
    }

    // refresh capcthca
    public function refreshCaptcha(){
        return response()->json(['captcha'=> captcha_img()]);
    }


}
