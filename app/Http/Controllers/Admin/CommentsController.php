<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Comments;
use App\Model\AnswerComment;

class CommentsController extends Controller
{
    //
    public function getComments($id=1){
        // comment info
        $Limit= 20;
        $comments= DB::select("SELECT comments.id,
                    comments.comment,
                    comments.created_at,
                    comments.checked,
                    activities_posts.apst_title,
                    users.name,
                    users.family,
                    comments_answer.answer
            FROM (((comments 
            INNER JOIN users ON comments.user_id = users.id)
            INNER JOIN activities_posts ON comments.post_id = activities_posts.id)
            LEFT JOIN comments_answer ON comments.id = comments_answer.comment_id)
            ORDER BY comments.created_at DESC
            LIMIT ?,? ",[(intval($id)-1)*$Limit,$Limit]);
            
            $pages = ceil((Comments::count())/$Limit);
            // dd($comments);
            return view('Admin/Comments/Comments',compact('comments','id','pages') );

    }


    public function checkComment(Request $request,AnswerComment $Ans){  
        $answer = AnswerComment::where("comment_id",$request->id)->first();
        if($answer){
            $answer->answer = $request->answer;
            $result = $answer->save();
            if(!$result){
                return redirect()->back()->with("error","خطای سیستمی، لطفا دوباره سعی کنید");
            }
        }
        elseif($request->answer != null){
            $Ans->comment_id = $request->id;
            $Ans->answer = $request->answer;
            $result = $Ans->save();
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
}
