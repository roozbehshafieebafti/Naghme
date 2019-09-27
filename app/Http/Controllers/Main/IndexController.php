<?php
namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Slider;
use App\Model\NewsLetter;

class IndexController extends Controller
{

    public function loadHomePage(Slider $Slide){
        $Slides = $Slide->orderBy('created_at','desc')->limit(3)->get();
        return view('Main.Home.Home',compact('Slides'));
    }

    public function saveNewsLetterEmails(Request $request){
        if(!isset($request->email_text)){
            return json_encode(['data'=>false , 'response'=>"ایمیل وارد نشده است"]);
        }
        if(NewsLetter::where('email',$request->email_text)->exists()){
            return json_encode(['data'=>false , 'response'=>"این ایمیل پیشتر در سامانه ذخیره شده است" ]);
        }
        $newRecord = new NewsLetter();

        $newRecord->email = $request->email_text;
        if($newRecord->save()){
            return json_encode(['data'=>true, 'response'=>"ایمیل شما با موفقیت در سامانه ثبت شد" ]);
        }
        return json_encode(['data'=>false, 'response'=>"خطای سیستمی، لطفا با مدیریت سیستم تماس برقرار نمایید" ]);
    }
}
