<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Forms;

class FormController extends Controller
{
    //getForms renders all forms in view
    public function getForms(){
        $Forms = Forms::all();
        return view('Admin.Forms.Forms',compact('Forms'));
    }

    //newForm renders a page for creating new form
    public function newForm(){
        return view('Admin.Forms.NewForm');
    }

    //createForm
    public function createForm(Request $request){
        $Word=null;
        //validation
        $this->validate($request ,
                        ['Form_title' => 'required' ,
                        'Form_text' => 'required'],
                        ['Form_title.required' => 'عنوان فرم نباید خالی باشد',
                        'Form_text.required' => 'توضیحات فرم نباید خالی باشد']);
        //check word file exists and save it
        if(isset($request->WORD_file))
        {
            $Word = $request->file('WORD_file')->store('files/forms');
        }
        //save pdf file    
        $Pdf = $request->file('PDF_file')->store('files/forms');
        //Insert data in database
        $form = Forms::insert([
            'form_title' => $request->Form_title ,
            'form_description' => $request->Form_text,
            'form_file1' =>  $Pdf ,
            'form_file2' =>  $Word ,
        ]);
        //check if done
        if($form){
            return 1;
        }else{
            return 0;
        }
    }
}
