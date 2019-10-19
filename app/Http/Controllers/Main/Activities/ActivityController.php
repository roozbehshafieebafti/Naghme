<?php

namespace App\Http\Controllers\Main\Activities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Model\ActivityNewsPicture;
use App\Model\Comments;

class ActivityController extends Controller
{
    //
    public function getActivity($id){
        
        $Activity = DB::select(
            "SELECT activities_posts.id,
                activities_posts.apst_activities_title_id,
                activities_posts.apst_sub_activities_title_id,
                activities_posts.apst_title,
                activities_posts.apst_description,
                activities_posts.apst_picture_of_title,
                activities_posts.apst_picture_of_title_mobile,
                activities_posts.apst_picture_of_cover,
                activities_posts.apst_is_cover_picture_landscape,
                activities_posts.apst_video,
                activities_posts.apst_accure_date,
                activities_pictures.apic_picture_name,
                activities_pictures.apic_picture_title
            FROM ( activities_posts 
            LEFT JOIN activities_pictures ON activities_posts.id = activities_pictures.apic_activities_posts_id)
            WHERE activities_posts.id = ".$id
        );

        $news= ActivityNewsPicture::where("activities_posts_id",$Activity[0]->id)->get();
        $comments = DB::select(
            "SELECT comments.comment,
                    comments.created_at,
                    users.name,
                    users.family,
                    comments_answer.answer,
                    comments_answer.created_at
            FROM ((comments 
            INNER JOIN users ON comments.user_id = users.id)
            LEFT JOIN comments_answer ON comments.id = comments_answer.comment_id)
            WHERE comments.post_id = ".$Activity[0]->id." AND comments.checked = 1"
        );

        $activity=[];
        $gallery=[];
        foreach($Activity as $key=>$value){            
            $activity= [
                "id"=> $value->id,
                "apst_activities_title_id"=> $value->apst_activities_title_id,
                "apst_description"=>$value->apst_description,
                "apst_sub_activities_title_id"=> $value->apst_sub_activities_title_id,
                "apst_title"=> $value->apst_title,
                "apst_picture_of_title"=> $value->apst_picture_of_title,
                "apst_picture_of_title_mobile"=> $value->apst_picture_of_title_mobile,
                "apst_picture_of_cover"=> $value->apst_picture_of_cover,
                "apst_is_cover_picture_landscape"=> $value->apst_is_cover_picture_landscape,
                "video"=>$value->apst_video,
                "date"=>$value->apst_accure_date
            ];
        }

        foreach($Activity as $key1=>$value1){
            $gallery[]=[
                    "picture" => $value1->apic_picture_name,
                    "picture_title"=> $value1->apic_picture_title
            ];
        }
        // dd( $comments);
        return view("Main.Activities.Activity",compact("activity","gallery","news","comments"));
    }

    public function setComment(Request $request, Comments $comment){
        if(!Auth::check()){
            return redirect()->route("Home");
        }
        $this->validate($request,["coment_value"=>"required"]);
        if($request->coment_value == "لطفا دیدگاه خود را در اینجا ثبت نمایید"){
            return redirect()->route("Home");
        }
        $User = Auth::user();
        $comment->user_id = $User->id;
        $comment->post_id =$request->comment_id;
        $comment->comment =$request->coment_value;
        if($comment->save()){
            return redirect()->back()->with("success","دیدگاه شما با موفقیت ثبت شد و پس از تایید مدیر سایت، نمایش داده می‌شود");
        }
        else{
            return redirect()->back()->with("danger","خطای سیستمی لطفا با مدیر سیستم تماس حاصل نمایید");
        }
    }
}
