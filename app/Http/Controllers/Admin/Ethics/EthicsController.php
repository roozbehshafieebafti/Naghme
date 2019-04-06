<?php

namespace App\Http\Controllers\Admin\Ethics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\StatementsEthics\ES_title as ETitle;
use App\Model\StatementsEthics\ES_list as Elist;

class EthicsController extends Controller
{
	//getEthics renders ethics in view
    public function getEthics(){
    	$Ethics = ETitle::where('set_kind','Ethics')->get();
    	return view('Admin.StatementsEthics.Ethics.Ethics',compact('Ethics'));
    }

    //newEthics renders page for creating new ethics
    public function newEthics(){
    	return view('Admin.StatementsEthics.Ethics.NewEthics');
    }

    //createEthics insert new Ethics in database
    public function createEthics(Request $request,ETitle $Ethics_title){
    	//validation
    	$this->validate($request ,
    					 ['New_Ethics' => 'required'],
    					 ['New_Ethics.required' => 'منشور نباید خالی باشد']);
    	//create new record
    	$Ethics_title->set_kind = 'Ethics';
    	$Ethics_title->set_title = $request->New_Ethics;

    	//save and check if done
    	if($Ethics_title->save()){
    		return redirect()->route('Get_Ethics')->with('success','منشور با موفقیت ثبت شد');
    	}
    	else{
    		return redirect()->route('Get_Ethics')->with('error','خطای سیستمی لطفا دوباره سعی کنید');	
    	}
    }

    //deleteEthics remove Ethics and Sub Ethics from database
    public function deleteEthics($id){
        //remove lists
        Elist::where('sel_title_id',$id)->delete();
    	//remove title
    	$Ethics = ETitle::where('id',$id)->delete();
        
    	//check if removed or not
    	if($Ethics){
    		return redirect()->back()->with('success','منشور با موفقیت حذف شد');
    	}
    	else
    	{
    		return redirect()->back()->with('error','خطای سیستمی لطفا دوباره سعی کنید');	
    	}
    }

    //editEthicsPage renders view for Editing Ethics
    public function editEthicsPage($id){
    	$EditableEthic = ETitle::find($id);
    	return view('Admin.StatementsEthics.Ethics.EditEthics',compact('EditableEthic'));
    }

    //doEditEthics 
    public function doEditEthics(Request $request,$id){
    	//validation
    	$this->validate($request ,
    					 ['New_Ethics' => 'required'],
    					 ['New_Ethics.required' => 'منشور نباید خالی باشد']);
    	//find and Edit
    	$Ethics_title= ETitle::find($id);
    	$Ethics_title->set_title = $request->New_Ethics;
    	//save and check if done or not
    	if($Ethics_title->save()){
    		return redirect()->route('Get_Ethics')->with('success','منشور با موفقیت ویرایش شد');
    	}
    	else{
    		return redirect()->route('Get_Ethics')->with('error','خطای سیستمی لطفا دوباره سعی کنید');	
    	}
    }
}
