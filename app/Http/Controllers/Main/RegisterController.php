<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

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
        ],
        ["regiser_captcha.captcha"=>"کد امنیتی صحیح نمی‌باشد"]);

        //  check if email exists or not
        $userExist = User::where("email",$request->regiser_email)->exists();

        if($userExist){
            if(!isset($request->AJAX)){
                return(redirect()->back()->with('danger','این نام کاربری قبلا در سیستم ثبت شده است'));
            }
            else{
                return response()->json(["data"=>"این نام کاربری قبلا در سیستم ثبت شده است"], 403, ['Content-Type'=>'application/json']);
            }
        }
        
        $user = new User();

        $user->name = $request->regiser_name;
        $user->family = $request->regiser_family;
        $user->email = $request->regiser_email;
        $user->role = 2;
        $user->password = $request->regiser_password;
        $user->remember_token = Crypt::encryptString($request->regiser_password);

        if($user->save()){
            $auth = Auth::attempt(
                [
                    'email'=>$request->regiser_email,
                    'password'=>$request->regiser_password,
                ]
            );
            
            if($auth){
                // get user Information
                $User = Auth::user();
                // general user
                if(!isset($request->AJAX)){
                    return redirect()->route('Home');
                }
                else{
                    return response()->json(["data"=>"true"], 200, ['Content-Type'=>'application/json']);
                }
            }
            else{
                // not Auth                
                if(!isset($request->AJAX)){
                    return(redirect()->route('Login')->with('danger','نام کاربری یا گذرواژه اشتباه است'));
                }
                else{
                    return response()->json(["data"=>"نام کاربری یا گذرواژه اشتباه است"], 400, ['Content-Type'=>'application/json']);
                }
            }
        }
        else{
            if(!isset($request->AJAX)){
                return(redirect()->back()->with('danger','خطای سیستمی لطفا با مدیر سیستم تماس برقرار نمایید'));
            }
            else{
                return response()->json(["data"=>"خطای سیستمی لطفا با مدیر سیستم تماس برقرار نمایید"], 500, ['Content-Type'=>'application/json']);
            }
        }
    }
}
