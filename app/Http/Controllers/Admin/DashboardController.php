<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Model\AnswerComment;
use App\Model\Comments;

class DashboardController extends Controller
{
    public function Index($id=1){
        // user info
        $limit= 10;
        $registerdUser = User::orderBy('created_at','DESC')->offset($id-1)->limit($limit)->get();
        $count = User::count();
        $pages = ceil($count/$limit);
        
        // comment info
        $commentLimit= 40;
        $comments= DB::select("SELECT comments.id,
                    comments.comment,
                    comments.created_at,
                    comments.checked,
                    activities_posts.apst_title,
                    users.name,
                    users.family,
                    comments_answer.answer,
                    comments_answer.created_at
            FROM (((comments 
            INNER JOIN users ON comments.user_id = users.id)
            INNER JOIN activities_posts ON comments.post_id = activities_posts.id)
            LEFT JOIN comments_answer ON comments.id = comments_answer.comment_id)
            WHERE comments.checked = 0
            LIMIT ".$commentLimit);
        // dd($comments);
    	return view('Admin.Dashboard.Dashboard',compact('registerdUser','count','limit','id','pages','comments'));
    }

    public function checkComment(Request $request,AnswerComment $answer){
        if(isset($request->answer)){
            $answer->comment_id = $request->id;
            $answer->answer = $request->answer;
            $result = $answer->save();
            if(!$result){
                return redirect()->back()->with("error","خطای سیستمی، لطفا دوباره سعی کنید");
            }
        }
        $comment = Comments::find($request->id);
        $comment->checked = 1;
        if($comment->save()){
            return redirect()->back()->with("success","عملیات با موفقیت انجام شد");
        }
        else{
            return redirect()->back()->with("error","خطای سیستمی، لطفا دوباره سعی کنید");
        }
    }

    public function deleteComment($id){
        $comment =Comments::find($id);
        if($comment->delete()){
            return redirect()->back()->with("success","عملیات با موفقیت انجام شد");
        }
        else{
            return redirect()->back()->with("error","خطای سیستمی، لطفا دوباره سعی کنید");
        }
        
    }
}
