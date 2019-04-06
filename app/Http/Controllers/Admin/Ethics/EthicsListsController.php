<?php

namespace App\Http\Controllers\Admin\Ethics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\StatementsEthics\ES_list as Elist;
use App\Model\StatementsEthics\ES_title as ETitle;
class EthicsListsController extends Controller
{
	//getEthicsList call all Ethics List from database and send them to view
    public function getEthicsList($id){
    	$EthicLists = Elist::where('sel_title_id',$id)->get();
    	$EthicTitle = ETitle::select('set_title')->where('id',$id)->get();
    	return view('Admin.StatementsEthics.Ethics.EthicList',compact('EthicLists','EthicTitle','id'));
    }

    //newEthicsList renders a page for create new Ethics List
    public function newEthicsList($id){
    	return view('Admin.StatementsEthics.Ethics.NewEthicsList' , compact('id') );
    }

    //createEthicsList
    public function createEthicsList(Request $request , Elist $NewList ,$id){
    	//validation
    	$this->validate($request,
    					['New_Ethics_List' => 'required'],
    					['New_Ethics_List.required' => 'مقدار زیرمجموعه منشور نباید خالی باشد']);

    	//create new record
    	$NewList->sel_title_id = $id;
    	$NewList->sel_description = $request->New_Ethics_List;

    	//save and check if done
    	if($NewList->save()){
    		return redirect()->route('Get_Ethics_List',$id)->with('success','زیرمجموعه با موفقیت وارد شد');
    	}
    	else{
    		return redirect()->route('Get_Ethics_List',$id)->with('error','خطای سیستمی لطفا دوباره سعی کنید');
    	}
    }

    //deleteEthicsList
    public function deleteEthicsList($id){
    	//remove Ethic's list
    	$DeletedRecord = Elist::where('id',$id)->delete();
    	//Check if removed or not
    	if($DeletedRecord){
    		return redirect()->back()->with('success','زیرمجموعه با موفقیت پاک شد');
    	}
    	else{
    		return redirect()->back()->with('error','خطای سیستمی لطفا دوباره سعی کنید');	
    	}
    }

    //editEthicsList renders page for editing list
    public function editEthicsList($id){
    	$EthicsList = Elist::find($id);
    	return view('Admin.StatementsEthics.Ethics.EditEthicsList',compact('EthicsList'));
    }

    //doEditEthicsList
    public function doEditEthicsList(Request $request ,$id){
    	//validation
    	$this->validate($request,
    					['New_Ethics_List' => 'required'],
    					['New_Ethics_List.required' => 'مقدار زیرمجموعه منشور نباید خالی باشد']);
    	//find the record and edit
    	$EditedList = Elist::find($id);
    	$EditedList->sel_description = $request->New_Ethics_List;

    	//save and check if done
    	if($EditedList->save())
    	{
    		return redirect()->route('Get_Ethics_List',$EditedList->sel_title_id)->with('success','زیرمجموعه با موفقیت ویرایش شد');
    	}
    	else{
    		return redirect()->route('Get_Ethics_List',$EditedList->sel_title_id)->with('error','خطای سیستمی لطفا دوباره سعی کنید');	
    	}
    }
}
