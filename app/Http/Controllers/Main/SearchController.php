<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;
use App\Model\Authorities;
use App\Model\DoActivity;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function getSearch(Request $request, $name){
        if(trim($name) == ""){
            return redirect()->back();
        }

        $news = News::select('id','news_title','news_date')
                ->where('news_title','like','%'.$name.'%')
                ->limit(10)
                ->get();
        $post= DoActivity::select('id','apst_title','apst_accure_date')
                ->where('apst_title','like','%'.$name.'%')
                ->limit(10)
                ->get();
        $authorities= DB::select('
            SELECT CONCAT(authorities_name, " " , authorities_family) as fullName,
            authorities.id,
            authorities_unit_title,
            authorities_name,
            authorities_family,
            authorities_city_id,
            representation_title
            FROM  (authorities INNER JOIN representation ON authorities.authorities_city_id = representation.id)
            WHERE CONCAT(authorities_name, " " , authorities_family) LIKE ?
            OR authorities_title LIKE ?
            LIMIT 10
        ',['%'.$name.'%','%'.$name.'%']);          
        
        $search = [];
        foreach($news as $item){
            $search[]= $item;
        }
        foreach($post as $item){
            $search[]= $item;
        }
        foreach($authorities as $item){
            $search[]= $item;
        }
        // dd( $search);
        return view('Main/Search/Search',compact('search','name'));
    }
}
