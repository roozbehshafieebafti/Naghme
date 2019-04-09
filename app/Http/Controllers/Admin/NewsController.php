<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;
use Hamcrest\Collection\IsEmptyTraversable;

class NewsController extends Controller
{
    public function getNews(){
        $Page = isset($_GET['page']) ? $_GET['page'] : 1;
        $Count = News::count();
        $News = News::offset($Page*10)->limit(10)->get();
        return view('Admin.News.News',compact('News','Count'));
    }

    public function createNews(){
        return view('Admin.News.CreateNews');
    }

    public function doCreateNews(){
        echo 'hi';
    }
}
