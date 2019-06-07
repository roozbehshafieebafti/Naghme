<?php

namespace App\Http\Controllers\Main\Authorities;
use App\Http\Controllers\Controller;
use App\Model\Authorities;
use App\Model\Duties;

class AuthoritiesController extends Controller
{
    //
    public function getAuthorities($title){
        $Authority = Authorities::where('authorities_title',$title)->get();
        $Duty = Duties::where('ad_authorities_title',$title)->get();

        
        return view('Main.Authorities.Authorities',compact('Authority','Duty','title'));
    }
}
