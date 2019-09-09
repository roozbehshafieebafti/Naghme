<?php

namespace App\Http\Controllers\Main\News;
use App\Http\Controllers\Controller;
use App\Model\News;
class MainNewsController extends Controller
{
    //
    public function getallNews($id=0){
        if(is_numeric($id) && $id>1){
            $news =News::orderBy('news_date','desc')->offset($id-1)->limit(20)->get();
        }
        else{
            $news =News::orderBy('news_date','desc')->offset(0)->limit(20)->get();
        }
        $Count = News::count();
        $Page = is_numeric($id) && $id>1 ? $id : 1;
        return view('Main.News.News',compact('news','Count','Page'));
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
