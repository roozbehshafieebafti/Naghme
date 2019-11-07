<?php

namespace App\Http\Controllers\Main\Activities;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ActivitiesController extends Controller
{
    // get All Activities
    public function getAcitivities($name,$id=1){
        if(!is_numeric($id) ){
            return view('errors.404');
        }
        $id = ($id)<2 ? 1 : $id;
        $Limit = 8;
        $Posts = DB::select('
            SELECT activities_title.at_title,
                    activities_posts.id,
                    activities_posts.apst_picture_of_cover,
                    activities_posts.apst_title,
                    activities_posts.apst_is_cover_picture_landscape
            FROM activities_title 
            INNER JOIN activities_posts 
            ON activities_title.id =  activities_posts.apst_activities_title_id
            WHERE activities_title.at_title= ?
            ORDER BY activities_posts.created_at DESC
            LIMIT ? , ?
        ',[$name,(intval($id)-1)*$Limit,$Limit]);
        $count = DB::select('
            SELECT COUNT(*) as total
            FROM activities_title 
            INNER JOIN activities_posts 
            ON activities_title.id =  activities_posts.apst_activities_title_id
            WHERE activities_title.at_title= ?',[$name]);
        $Count=$count[0]->total;
        $Page = $id<2 ?  1: $id;
       return view("Main.Activities.Activities", compact('Posts','name','Count','Page','Limit'));
    }
}
