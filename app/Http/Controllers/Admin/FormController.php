<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Forms;
use Illuminate\Support\Facades\Storage;

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
    public function createForm(Request $request , Forms $Form){
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
        $Form->form_title = $request->Form_title ;
        $Form->form_description = $request->Form_text;
        $Form->form_file1 = $Pdf ;
        $Form->form_file2 =  $Word ;
        // $form = Forms::insert([
        //     'form_title' => $request->Form_title ,
        //     'form_description' => $request->Form_text,
        //     'form_file1' =>  $Pdf ,
        //     'form_file2' =>  $Word ,
        // ]);
        //check if done
        if($Form->save()){
            return 1;
        }else{
            return 0;
        }
    }

    //deleteForm
    public function deleteForm($id){
        $DeletedForms = Forms::find($id);
        Storage::delete($DeletedForms->form_file1);
        if($DeletedForms->form_file2){
            Storage::delete($DeletedForms->form_file2);
        }
        
        if($DeletedForms->delete()){
            return back()->with('success','فرم با موفقیت حذف شد');    
        }else{
            return back()->with('error','خطای سیستمی لطفا دوباره سعی کنید');    
        }
    }

    public function editForm($id){
        $Forms =Forms::find($id);
        return view('Admin.Forms.EditForm',compact('Forms'));
    }

    public function doEditForm(Request $request , $id){
        //validation
        $this->validate($request ,
                        ['Form_title' => 'required' ,
                        'Form_text' => 'required'],
                        ['Form_title.required' => 'عنوان فرم نباید خالی باشد',
                        'Form_text.required' => 'توضیحات فرم نباید خالی باشد']);
        $Forms =Forms::find($id);

        if(isset($request->Check_word_file)){
            Storage::delete($Forms->form_file2);
            $Forms->form_file2 = null ;
        }

        if(isset($request->PDF_file)){
            Storage::delete($Forms->form_file1);
            $Pdf = $request->file('PDF_file')->store('files/forms');
            $Forms->form_file1 = $Pdf ;
        }

        if(isset($request->WORD_file)){
            $Word = $request->file('WORD_file')->store('files/forms');
            Storage::delete($Forms->form_file2);
            $Forms->form_file2 = $Word ;
        }
        $Forms->form_title = $request->Form_title ;
        $Forms->form_description = $request->Form_text;

        if($Forms->save()){
            return 1;
        }
        return 0;
    }
}
