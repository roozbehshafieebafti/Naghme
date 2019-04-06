<?php

namespace App\Http\Controllers\Admin\Activities;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ActivityTitle as ActTitle ;

class ActionTitleController extends Controller
{
	//
    public function getActivityTitle(){
    	$ActTitle = ActTitle::all();
    	return view('Admin.Activities.ActivityTitle.ActivityTitle',compact('ActTitle'));
    }

    //
    public function NewActivityTitle(){
    	return view('Admin.Activities.ActivityTitle.NewActivityTitle');
    }

    //
    public function createActivityTitle(Request $request , ActTitle $actTitle){
    	$this->validate($request ,
    						['New_Activities' => 'required',
    						'Activities_Text' => 'required'],
    						['New_Activities.required' => 'نام فعالیت نمی تواند خالی باشد',
    						'Activities_Text.required' => 'توضیحات نمی تواند خالی باشد']);
    	$actTitle->at_title = $request->New_Activities;
    	$actTitle->at_description = $request->Activities_Text;

    	if($actTitle->save()){
    		return redirect()->route('Get_Activity')->with('success','فعالیت با موفقیت وارد شد');
    	}
    	else
    	{
    		return redirect()->route('Get_Activity')->with('error','خطای سیستمی لطفا دوباره سعی کنید');	
    	}
    }
}
