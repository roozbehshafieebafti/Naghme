<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Slider;

class IndexController extends Controller
{

    public function loadHomePage(Slider $Slide){
        $Slides = $Slide->all();
        return view('Main.Home.Home',compact('Slides'));
    }
}
