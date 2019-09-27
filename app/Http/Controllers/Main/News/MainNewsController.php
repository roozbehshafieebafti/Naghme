<?php

namespace App\Http\Controllers\Main\News;
use App\Http\Controllers\Controller;
use App\Model\News;
class MainNewsController extends Controller
{
    //
    public function getallNews($id=1){
        if(!is_numeric($id)){
            return view('errors.404');
        }
        $id = $id<1 ? 1 : $id;
        $Limit = 10;
        $news =News::select("id","news_title","news_cover_picture","news_description","news_date")
                ->orderBy('news_date','desc')
                ->offset($id-1)
                ->limit($Limit)
                ->get();
        $Count = News::count();
        $Page = $id>1 ? $id : 1;
        return view('Main.News.News',compact('news','Count','Page','Limit'));
    }

    //
    public function continueReading($id){
        if(!is_numeric($id)){
            return view('errors.404');
        }

        $selected_news =News::find($id);
        if($selected_news) return view('Main.News.LoadMore',compact('selected_news'));

        return view('errors.404');
    }
}
