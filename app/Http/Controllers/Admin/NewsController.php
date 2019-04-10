<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function getNews(){
        $Page = isset($_GET['page']) ? $_GET['page'] : 1;
        $Count = News::count();
        $News = News::offset(($Page-1)*10)->limit(10)->get();
        return view('Admin.News.News',compact('News','Count'));

    }

    public function createNews(){
        return view('Admin.News.CreateNews');
    }

    public function doCreateNews(Request $request){
        $this->validate($request ,
                                ['News_title' => 'required',
                                'News_text' => 'required']);
        $Picture = $request->file('Picture_file')->store('files/news/pictures');
        $File = $request->file('News_file')->store('files/news/files');


        $InsertNews=News::insert([
             'news_title' => $request->News_title,
             'news_description' =>  $request->News_text ,
             'news_picture' => $Picture ,
             'news_file' => $File ,
             'news_link_name' => $request->NewsLinkName,
             'news_link' => $request->NewsLinkAddress,
             'news_date' => time()
         ]);

         if($InsertNews){
             return 1;
         }
         return 0;
    }

    public function deleteNews($id){
        $deletedRecord = News::find($id);
        Storage::delete($deletedRecord->news_picture);
        if($deletedRecord->news_file!='')
        {
            Storage::delete($deletedRecord->news_file);
        }
    	if($deletedRecord->delete()){
    		return back()->with('success','خبر با موفقیت پاک شد');
    	}
    	else{
    		return back()->with('success','خطای سیستمی لطفا دوباره سعی کنید');	
    	}
    }
}
