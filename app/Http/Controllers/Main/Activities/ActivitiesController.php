<?php

namespace App\Http\Controllers\Main\Activities;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ActivitiesController extends Controller
{
    // get All Activities
    public function getAcitivities($name,$id=1){
        $Posts = DB::select('
            SELECT activities_title.at_title,
                    activities_posts.apst_picture_of_cover,
                    activities_posts.apst_title,
                    activities_posts.apst_is_cover_picture_landscape
            FROM activities_title 
            INNER JOIN activities_posts 
            ON activities_title.id =  activities_posts.apst_activities_title_id
            WHERE activities_title.at_title= "'.$name.'"
            ORDER BY activities_posts.created_at DESC
            LIMIT '.($id-1).' , 8
        ');
       
       return view("Main.Activities.Activities", compact('Posts','name'));
    }
}
