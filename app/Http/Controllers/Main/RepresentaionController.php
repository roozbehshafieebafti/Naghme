<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Represeentaion;

class RepresentaionController extends Controller
{
    //
    public function getRepresentation(Represeentaion $represent){
        $Representaions= "Representaion";
        $Represent = $represent->where('id','>',1)->get();
        
        return view("Main/Representaion/Representaion",compact("Representaions","Represent"));
    }
}
