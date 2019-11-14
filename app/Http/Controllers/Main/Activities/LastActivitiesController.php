<?php

namespace App\Http\Controllers\Main\Activities;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LastActivitiesController extends Controller
{
    public function getAll(){
        $titles = DB::select('SELECT id, at_title
                                FROM activities_title a
                                JOIN (
                                SELECT DISTINCT apst_activities_title_id
                                FROM activities_posts
                                ORDER BY id DESC
                                LIMIT 10) tbl
                                ON a.id =  tbl.apst_activities_title_id');            

        $posts = DB::select('SELECT t.* FROM 
                                (SELECT a.id, a.apst_activities_title_id, a.apst_title,a.apst_picture_of_cover, a.apst_is_cover_picture_landscape,
                                    ( SELECT count(*) 
                                    FROM activities_posts  b 
                                    WHERE a.apst_activities_title_id = b.apst_activities_title_id AND a.id <= b.id ) 
                                AS row_number 
                                FROM  activities_posts  a ) t
                            JOIN         
                                (SELECT distinct ap.apst_activities_title_id
                                FROM activities_posts ap
                                order by ap.apst_accure_date DESC
                                limit 10) tbl        
                            on t.apst_activities_title_id = tbl.apst_activities_title_id
                            WHERE t.row_number<=4
                            ORDER BY apst_activities_title_id ASC
                            ');
                                      


        $titleIds=[];
        $Posts=[];
        foreach($titles as $val){
            $titleIds[ $val->id]=$val->at_title;
        }
        foreach ($posts as $value) {
            $Posts[$value->apst_activities_title_id][]=$value;
        }
        // dd($titles,$Posts,$titleIds);
        return view("Main/Activities/AllActivities",compact("titles","Posts","titleIds"));
    }
}
