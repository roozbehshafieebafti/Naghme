<?php

namespace App\Http\Controllers\Admin\Regulations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Regulations;
use Illuminate\Support\Facades\Storage;
class RegulationsController extends Controller
{
	//getRegulations sends Regulations from database to view
    public function getRegulations(){
        $Regule = Regulations::all();
    	return view('Admin.Regulations.Regulations',compact('Regule'));
    }

    public function newRegulations(){
    	return view('Admin.Regulations.NewRegulations');
    }

    public function createRegulation(Request $request ,Regulations $regulation){
        $this->validate($request,
                        ['Regulation_text'=>'required',
                        'Regulation_title' => 'required'],
                        ['Regulation_text.required' => 'توضیحات نباید خالی باشد',
                        'Regulation_title.required' => 'عنوان نمی تواند خالی باشد'] );
        //Insert in database
        $regulation->regulations_title = $request->Regulation_title ;
        $regulation->regulations_description = $request->Regulation_text ;
        
        //save file in public folder
        $path = $request->file('Regulation_File')->store('files/regule');

        //
        $regulation->regulations_file_name = $path ;

        if($regulation->save()){
            return 1;
        }
    }

    public function deleteRegulation($id){
        $DeletedRecord = Regulations::find($id);
        $DeletedFile = Storage::delete($DeletedRecord->regulations_file_name);
        $DeletedRecord->delete();

        if($DeletedRecord){
            return back()->with('success','آئین نامه با موفقیت حذف شد');    
        }
        else{
            return back()->with('error','خطای سیستمی لطفا دوباره سعی کنید');
        }
    }

    public function editRegulation($id){
        $EditableRecord = Regulations::find($id);
        return view('Admin.Regulations.EditRegulation',compact('EditableRecord'));
    }

    public function doEditRegulation(Request $request, $id){
        $this->validate($request,
                        ['Regulation_text'=>'required',
                        'Regulation_title' => 'required'],
                        ['Regulation_text.required' => 'توضیحات نباید خالی باشد',
                        'Regulation_title.required' => 'عنوان نمی تواند خالی باشد'] );
        $EditedRecord = Regulations::find($id);
        if(isset($request->Regulation_File)){
            Storage::delete($EditedRecord->regulations_file_name);
            $path = $request->file('Regulation_File')->store('files/regule');
            $EditedRecord->regulations_file_name = $path ;

        }
        $EditedRecord->regulations_title = $request->Regulation_title;
        $EditedRecord->regulations_description = $request->Regulation_text;

        if($EditedRecord->save()){
            return 1;
        }
        
        return 0;
    }
}
