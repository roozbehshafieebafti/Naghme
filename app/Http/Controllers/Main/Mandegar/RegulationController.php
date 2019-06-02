<?php

namespace App\Http\Controllers\Main\Mandegar;
use App\Http\Controllers\Controller;
use App\Model\Regulations;

class RegulationController extends Controller
{
    //
    public function getRegulations(){
        $Regulation = Regulations::all();
        return view('Main.Regulation.Regulation',compact('Regulation'));
    }
}
