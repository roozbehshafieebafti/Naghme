<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    //getNews sends the News and Number of all news to View 
    public function getNews(){
        //get the page number 
        $Page = isset($_GET['page']) ? $_GET['page'] : 1;
        //Number of news
        $Count = News::count();
        //get News
        $News = News::orderBy('news_date','desc')->offset(($Page-1)*10)->limit(10)->get();
        return view('Admin.News.News',compact('News','Count','Page'));
    }

    //createNews renders a page for creating news
    public function createNews(){
        return view('Admin.News.CreateNews');
    }

    //doCreateNews
    public function doCreateNews(Request $request){
        
        $File=null;
        //validation
        $this->validate($request ,
                                ['News_title' => 'required',
                                'News_text' => 'required']);

        //Store Picture and file in Public folder
        $Picture = $request->file('Picture_file')->store('files/news/pictures');
        if(isset($request->News_file)){
            $File = $request->file('News_file')->store('files/news/files');
        }

        //Insert in database
        $InsertNews=News::insert([
             'news_title' => $request->News_title,
             'news_description' =>  $request->News_text ,
             'news_picture' => $Picture ,
             'news_file' => $File ,
             'news_link_name' => $request->NewsLinkName,
             'news_link' => $request->NewsLinkAddress,
             'news_link_name2' => $request->NewsLinkName2,
             'news_link2' => $request->NewsLinkAddress2,
             'news_link_name3' => $request->NewsLinkName3,
             'news_link3' => $request->NewsLinkAddress3,
             'news_date' => time()
         ]);
        
         //Check if inserted 
         if($InsertNews){
             return 1;
         }
         return 0;
    }


    //deleteNews
    public function deleteNews($id){
        //find record
        $deletedRecord = News::find($id);
        
        //delete from folder
        Storage::delete($deletedRecord->news_picture);
        if($deletedRecord->news_file!='')
        {
            Storage::delete($deletedRecord->news_file);
        }
        //delete and check if done
    	if($deletedRecord->delete()){
    		return back()->with('success','خبر با موفقیت پاک شد');
    	}
    	else{
    		return back()->with('success','خطای سیستمی لطفا دوباره سعی کنید');	
    	}
    }

    //editNews renders a page for edit news
    public function editNews($id){
        $editabledRecord = News::find($id);
        //dd($editabledRecord);
        return view('Admin.News.EditNews',compact('editabledRecord','id'));
    }

    public function doEditNews(Request $request,$id){
        //validation
        $this->validate($request ,
                                ['News_title' => 'required',
                                'News_text' => 'required']);

        $editedRecord = News::find($id);
        if(isset($request->Delete_News_file)){
            Storage::delete($editedRecord->news_file);
            $editedRecord->news_file = null;
        }
        if(isset($request->Picture_file)){
            $Picture = $request->file('Picture_file')->store('files/news/pictures');
            Storage::delete($editedRecord->news_picture);
            $editedRecord->news_picture = $Picture;
        }
        if(isset($request->News_file)){
            Storage::delete($editedRecord->news_file);
            $File = $request->file('News_file')->store('files/news/files');
            $editedRecord->news_file = $File;
        }
        $editedRecord->news_title =$request->News_title;
        $editedRecord->news_description =$request->News_text;
        $editedRecord->news_link_name =$request->NewsLinkName;
        $editedRecord->news_link =$request->NewsLinkAddress;
        $editedRecord->news_link_name2 = $request->NewsLinkName2;
        $editedRecord->news_link2 = $request->NewsLinkAddress2;
        $editedRecord->news_link_name3 = $request->NewsLinkName3;
        $editedRecord->news_link3 = $request->NewsLinkAddress3;

        if($editedRecord->save())
        {
            return 1;
        }
        return 0;
    }

    //
    public function findNews($item){
        $News = News::select('news_title')->where('news_title','like','%'.$item.'%')->limit(10)->get();
        return $News;
    }

    //
    public function searchNews($item){
        $News = News::where('news_title','like','%'.$item.'%')->get();
        $search = 1;
        return view('Admin.News.News',compact('News','search'));
    }
}
