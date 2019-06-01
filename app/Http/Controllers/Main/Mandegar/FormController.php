<?php

namespace App\Http\Controllers\Main\Mandegar;
use App\Http\Controllers\Controller;
use App\Model\Forms;

class FormController extends Controller
{
    //
    public function getForms(){
        $Form = Forms::all();        
        return view('Main.Forms.Forms',compact('Form'));
    }
}
