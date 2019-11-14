<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;
use Illuminate\Support\Facades\Storage;
use \Morilog\Jalali\Jalalian;

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

        // date validation
        $dateValidationResult =$this->dateValidation($request->News_Date);
        if(!$dateValidationResult["status"]){
            return -1;
        }
        $date = (new Jalalian((int)$dateValidationResult["year"], (int)$dateValidationResult["month"], (int)$dateValidationResult["day"], 0, 0, 0))->toCarbon()->toDateTimeString() ;
    
        //Store Picture and file in Public folder
        $Picture = $request->file('Picture_file')->store('files/news/pictures');
        $CoverPicture = $request->file('Cover_Picture_file')->store('files/news/pictures');
        if(isset($request->News_file)){
            $File = $request->file('News_file')->store('files/news/files');
        }

        //Insert in database
        $InsertNews=News::insert([
             'news_title' => $request->News_title,
             'news_description' =>  $request->News_text,
             'news_picture' => $Picture,
             'news_cover_picture' => $CoverPicture,
             'news_file' => $File,
             'news_text_sumery' => $request->News_text_sumery,
             'news_date' => $date,
             "created_at" => date("Y-m-d H:i:s"),
             "updated_at" => date("Y-m-d H:i:s"),
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
        Storage::delete($deletedRecord->news_cover_picture);
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
        // dd($editabledRecord);
        return view('Admin.News.EditNews',compact('editabledRecord','id'));
    }

    public function doEditNews(Request $request,$id){
        //validation
        $this->validate($request ,
                                ['News_title' => 'required',
                                'News_text' => 'required']);
        // date validation
        $dateValidationResult =$this->dateValidation($request->News_Date);
        if(!$dateValidationResult["status"]){
            return -1;
        }
        $date = (new Jalalian((int)$dateValidationResult["year"], (int)$dateValidationResult["month"], (int)$dateValidationResult["day"], 0, 0, 0))->toCarbon()->toDateTimeString() ;
        
        $editedRecord = News::find($id);
        if(isset($request->Delete_News_file) &&  ($editedRecord->news_file !== null)){
            Storage::delete($editedRecord->news_file);
            $editedRecord->news_file = null;
        }
        if(isset($request->Picture_file)){
            $Picture = $request->file('Picture_file')->store('files/news/pictures');
            Storage::delete($editedRecord->news_picture);
            $editedRecord->news_picture = $Picture;
        }
        if(isset($request->Cover_Picture_file)){
            $CoverPicture = $request->file('Cover_Picture_file')->store('files/news/pictures');
            Storage::delete($editedRecord->news_cover_picture);
            $editedRecord->news_cover_picture = $CoverPicture;
        }
        if(isset($request->News_file)){
            Storage::delete($editedRecord->news_file);
            $File = $request->file('News_file')->store('files/news/files');
            $editedRecord->news_file = $File;
        }
        $editedRecord->news_title =$request->News_title;
        $editedRecord->news_description =$request->News_text;
        $editedRecord->news_text_sumery =$request->News_text_sumery;
        $editedRecord->news_date =$date;


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

    private function dateValidation ($date){
        $year = $date[0].$date[1].$date[2].$date[3];
        $month = $date[5].$date[6];
        $day = $date[8].$date[9];

        if((!is_integer($year) AND $year<1380)) return ["status"=>false];
        if((!is_integer($month) AND $month>12)) return ["status"=>false];
        if((!is_integer($day) AND $day>31)) return ["status"=>false];
        
        return ["status"=>true, 'year'=> $year , "month" =>  $month , "day" => $day];
    }
}
