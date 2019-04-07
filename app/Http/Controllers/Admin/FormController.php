<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Forms;

class FormController extends Controller
{
    //getForms
    public function getForms(){
        $Forms = Forms::all();
        return view('Admin.Forms.Forms',compact('Forms'));
    }
}
