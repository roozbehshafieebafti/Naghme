<?php

namespace App\Http\Controllers\Main\Activities;

use App\Http\Controllers\Controller;
use App\Model\ActivityTitle;
use App\Model\SubActivityTitle;

class ActivitiesController extends Controller
{
    // get All Activities
    public function getAcitivities($name){
        $Title = ActivityTitle::where('at_title',$name)->get();
        if(count($Title)>0){
            dd('نیاز به بررسی بیشتر');
        }
        else{
            $Title = SubActivityTitle::where('sat_title',$name)->get();
            if(count($Title)>0){
                dd('نیاز به بررسی بیشتر');
            }
            else{
                return view('errors.404');
            }
        }
    }
}
