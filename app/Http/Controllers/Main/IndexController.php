<?php

namespace App\Http\Controllers\Main;
use App\Http\Controllers\Controller;
use App\Model\Slider;

class IndexController extends Controller
{

    public function loadHomePage(Slider $Slide){
        $Slides = $Slide->orderBy('created_at','desc')->limit(3)->get();
        return view('Main.Home.Home',compact('Slides'));
    }
}
