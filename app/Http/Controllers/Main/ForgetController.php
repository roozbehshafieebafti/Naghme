<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ForgetController extends Controller
{
    //
    public function forgetPage () {
        $forget = "";
        return view("Main/Forget/Forget",compact("forget"));
    }

    public function sendInformationToEmail(Request $request){
        $this->validate($request,[
            'forget_email' => 'required|email',
            'captcha_ng' => 'required|captcha'
        ],[
            "forget_email.required"=>"ورود ایمیل الزامی است",
            "forget_email.email"=> "ایمیل شما ساختار صحیح ندارد",
            "captcha_ng.captcha"=>"کد امنیتی صحیح نمی‌باشد",
            "captcha_ng.required"=>"ورود کد امنیتی الزامی است",
        ]);
        $find = User::select("forget","email")->where('email',$request->forget_email)->get();
        if(isset($find[0])){
            if($find[0]['attributes']['forget']>0){
                return redirect()->back()->with('danger','شما تنها یک‌بار مجاز به اسفاده از این سرویس هستید');
            }
        }
        else{
            return redirect()->back()->with('danger','چنین ایمیلی در سیستم ثبت نشده است');
        }
        $newPassword = $this->randomPassword();
        $user = User::where('email',$request->forget_email)->update(['password'=>bcrypt($newPassword)]);
        if($user){
            $Text = '
            email: '.$request->forget_email.'
            password: '.$newPassword .'';

            $to      = $request->forget_email;
            $subject = 'بازیابی گذرواژه';
            $message = $Text;
            $headers = 'From: info@naghmehmandegar.org' . "\r\n" .'Reply-To: info@naghmehmandegar.org' . "\r\n";
            mail($to, $subject, $message, $headers);
            $user = User::where('email',$request->forget_email)->update(['forget'=>1]);
            return redirect()->back()->with('success','.ایمیل با موفقیت ارسال شد، امکان دارد ایمیل به پوشه اسپم وارد شده باشد لطفا این پوشه را هم چک کنید');
        }
        else{
            return redirect()->back()->with('danger','متاسفانه مشکلی در سیستم رخ داده است، لطفا دوباره سعی کنید');
        }
        
    }

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}
