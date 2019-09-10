<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Crypt;

class RegisterController extends Controller
{
    //
    public function registerPage () {
        $register = "";
        return view("Main/Register/Register",compact("register"));
    }

    // do register new user
    public function doRegister(Request $request){  
        //    validation
        $this->validate($request,[
          "regiser_name"  => "required",
          "regiser_family"  => "required",
          "regiser_email"  => "required|email",
          "regiser_password"  => "required",
          'regiser_captcha' => 'required|captcha'
        ]);

        //  check if email exists or not
        $userExist = User::where("email",$request->regiser_email)->exists();

        if($userExist){
            return(redirect()->back()->with('danger','این نام کاربری قبلا در سیستم ثبت شده است.'));
        }
        
        $user = new User();

        $user->name = $request->regiser_name;
        $user->family = $request->regiser_family;
        $user->email = $request->regiser_email;
        $user->role = 2;
        $user->password = $request->regiser_password;
        $user->remember_token = Crypt::encryptString($request->regiser_password);

        dd($user->save());
    }
}
