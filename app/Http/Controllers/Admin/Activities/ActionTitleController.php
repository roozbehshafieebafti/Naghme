<?php

namespace App\Http\Controllers\Admin\Activities;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ActivityTitle as ActTitle ;

class ActionTitleController extends Controller
{
	//getActivityTitle catch All activities from database and sends them to view
    public function getActivityTitle(){
		//catch from database
    	$ActTitle = ActTitle::all();
    	return view('Admin.Activities.ActivityTitle.ActivityTitle',compact('ActTitle'));
    }

    //NewActivityTitle renders a page for adding new Activity Title
    public function newActivityTitle(){
    	return view('Admin.Activities.ActivityTitle.NewActivityTitle');
    }

    //createActivityTitle
    public function createActivityTitle(Request $request , ActTitle $actTitle){
		
		//validation check
    	$this->validate($request ,
    						['New_Activities' => 'required',
    						'Activities_Text' => 'required'],
    						['New_Activities.required' => 'نام فعالیت نمی تواند خالی باشد',
							'Activities_Text.required' => 'توضیحات نمی تواند خالی باشد']);
		//check this title is repititive or not
			$findRepitive = ActTitle::where('at_title',$request->New_Activities)->get();
			if(count($findRepitive)>0){
				return back()->with('error','عنوان تکراری است');
			}
		//Create new Record
    	$actTitle->at_title = $request->New_Activities;
    	$actTitle->at_description = $request->Activities_Text;

		//save and check if stored
    	if($actTitle->save()){
    		return redirect()->route('Get_Activity')->with('success','فعالیت با موفقیت وارد شد');
    	}
    	else
    	{
    		return redirect()->route('Get_Activity')->with('error','خطای سیستمی لطفا دوباره سعی کنید');	
    	}
	}
	
	//deleteActivity
	public function deleteActivity($id){
		$DeletedRecord = ActTitle::where('id',$id)->delete();
		if($DeletedRecord){
			return back()->with('success','فعالیت با موفقیت حذف شد');
		}
		else{
			return back()->with('error','خطای سیستمی لطفا دوباره سعی کنید');
		}
	}

	//editActivity renders a page for editing activity title
	public function editActivity($id){
		$EditableActivity = ActTitle::find($id);
		return view('Admin.Activities.ActivityTitle.EditActivity',compact('EditableActivity'));
	}

	//doEditActivity
	public function doEditActivity(Request $request , $id){
		//validation
		$this->validate($request,
										['Activity_title' => 'required',
										'Activity_description' => 'required'],
										['Activity_title.required' => 'ورود عنوان فعالیت الزامی است',
										'Activity_description.required' => 'ورود توضیحات الزامی است']
										);
		
		//find the record										
		$EditedActivity = ActTitle::find($id);

		//edit 
		$EditedActivity->at_title = $request->Activity_title;
		$EditedActivity->at_description = $request->Activity_description  ;
		
		//save and check if Done
		if($EditedActivity->save()){
			return redirect()->route('Get_Activity')->with('success','فعالیت با موفقیت ویرایش شد');
		}
		else{
			return redirect()->route('Get_Activity')->with('error','خطای سیستمی لطفا دوباره سعی کنید');
		}
	}
}
