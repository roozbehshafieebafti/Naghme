<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\UserScore;

class UserScoreController extends Controller
{
    public function getUserScore(){
        $UserScore = UserScore::where('kind','score')->get();
        return view('Admin.Score.UserScore',compact('UserScore'));
    }

    public function newScore(){
        return view('Admin.Score.NewScore');
    }

    public function createScore(Request $request, UserScore $Score){
        $this->validate($request ,
                        ['New_Score' => 'required'],
                        ['New_Score.required' => 'امتیاز نباید خالی باشد']);
        $Score->kind = 'score';
        $Score->score_description = $request->New_Score;

        if($Score->save()){
            return redirect()->route('Get_Score')->with('success','امتیاز با موفقیت ثبت شد');
        }
        else{
            return redirect()->route('Get_Score')->with('error','خطای سیستمی لطفا دوباره سعی کنید');
        }
    }

    public function editScore($id){
        $UserScore = UserScore::find($id);
        return view('Admin.Score.EditScore',compact('UserScore'));
    }

    public function doEditScore(Request $request,$id){
        $this->validate($request ,
                        ['New_Score' => 'required'],
                        ['New_Score.required' => 'امتیاز نباید خالی باشد']);
        $Score = UserScore::find($id);                   
        $Score->score_description = $request->New_Score;

        if($Score->save()){
            return redirect()->route('Get_Score')->with('success','امتیاز با موفقیت ثبت شد');
        }
        else{
            return redirect()->route('Get_Score')->with('error','خطای سیستمی لطفا دوباره سعی کنید');
        }
    }

    public function deleteScore($id){
        $Score = UserScore::find($id);
        if($Score->delete()){
            return redirect()->route('Get_Score')->with('success','امتیاز با موفقیت حذف شد');
        }
        else{
            return redirect()->route('Get_Score')->with('error','خطای سیستمی لطفا دوباره سعی کنید');
        }
    }
}
