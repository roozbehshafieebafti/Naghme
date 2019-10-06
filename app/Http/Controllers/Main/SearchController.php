<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;
use App\Model\Authorities;
use App\Model\DoActivity;

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
        $authorities= Authorities::select('id','authorities_title','authorities_name','authorities_family')
                ->where('authorities_name','like','%'.$name.'%')
                ->orWhere('authorities_family','like','%'.$name.'%')
                ->orWhere('authorities_title','like','%'.$name.'%')
                ->limit(10)
                ->get();
        
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
