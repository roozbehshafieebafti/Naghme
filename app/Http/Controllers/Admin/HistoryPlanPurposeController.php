<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\HistoryPlanePurpose as HPP ;

class HistoryPlanPurposeController extends Controller
{
	// getHistory sends history data from history_purpose_plan table to view
    public function getHistory(){
    	$History = HPP::where('hpp_kind','history')->get();
    	return view('Admin.HistoryPlanPurpose.History' , compact('History'));
    }

    //editHistory
    public function editHistory(Request $request, HPP $hpp){

    	//validation for History data
    	$this->validate($request,
    		[
    			'History_data' => 'required'
    		],
    		[
    			'History_data.required' => 'مقدار تاریخچه نباید خالی باشد'
    		]
    	);

    	// update table
    	$Result = $hpp->where('hpp_kind','history')->update(['hpp_data'=>$request->History_data]);

    	//check for update
    	if($Result)
    	{
    		return redirect()->route('Get_History')->with('success','به روز رسانی با موقیت انجام شد.');
    	}
    	else
    	{
    		return redirect()->route('Get_History')->with('error','خطای سیستمی');
    	}
    }

    //getPurpose sends Pupose data from history_purpose_plan table to view
    public function getPurpose(){
    	$Purpose = HPP::where('hpp_kind','purpose')->get();
    	return view('Admin.HistoryPlanPurpose.Purpose.Purpose',compact('Purpose'));
    }

    //newPurpose loads view for inserting Purpose in database
    public function newPurpose(){

        return view('Admin.HistoryPlanPurpose.Purpose.NewPurpose');
    }

    //createPurpose
    public function createPurpose(Request $request, HPP $hpp){

        //validation
        $this->validate($request,
            ['New_Purpose' => 'required'],
            ['New_Purpose.required' => 'مقدار هدف نباید خالی باشد']);
        // Insert to database
        $hpp->hpp_kind = 'purpose';
        $hpp->hpp_data = $request->New_Purpose;
        $Result = $hpp->save();

        // check if inserted or not
        if($Result)
        {
            return redirect()->route('Get_Purpose')->with('success','هدف با موفقیت وارد شد');
        }else{
            return redirect()->route('Get_Purpose')->with('error','مشکل سیستمی، دوباره سعی کنید');
        }
    }

    //deletePurpose
    public function deletePurpose($id){
        // find the record
        $purposeRecord=HPP::find($id);

        // delete and check if deleted or not
        if($purposeRecord->delete()){
            return redirect()->route('Get_Purpose')->with('success','حذف با موفقیت انجام شد');
        }
        else{
            return redirect()->route('Get_Purpose')->with('error','ایراد سیستمی لطفا دباره سعی کنید');
        }
    }

    //editPurposePage renders the edit page for specefic purpose that is selected
    public function editPurposePage($id){
        $editableRecord=HPP::find($id);
        return view('Admin.HistoryPlanPurpose.Purpose.EditPurpose',compact('editableRecord'));
    }

    //doEditPurpose optarate the changes in edit purpose page
    public function doEditPurpose(Request $request ,$id){
        $this->validate($request,
            ['New_Purpose' => 'required'],
            ['New_Purpose.required' => 'مقدار هدف نباید خالی باشد']);

        $editedRecord=HPP::find($id);
        $editedRecord->hpp_data = $request->New_Purpose;
        if($editedRecord->save()){
            return redirect()->route('Get_Purpose')->with('success','هدف با موفقیت به روز رسانی شد');
        }else{
            return redirect()->route('Get_Purpose')->with('error','خطای سیستمی، دوباره سعی کنید');
        }
    }


    public function getPlan(){
        $Plan=HPP::where('hpp_kind','plan')->get();
        return view('Admin.HistoryPlanPurpose.Plan.Plan',compact('Plan'));
    }

    public function newPlan(){

        return view('Admin.HistoryPlanPurpose.Plan.NewPlan');
    }

    public function createPlan(Request $request, HPP $hpp){
        //validation
        $this->validate($request,
            ['New_Plan' => 'required'],
            ['New_Plan.required' => 'مقدار برنامه نباید خالی باشد']);
        // Insert to database
        $hpp->hpp_kind = 'plan';
        $hpp->hpp_data = $request->New_Plan;
        $Result = $hpp->save();

        // check if inserted or not
        if($Result)
        {
            return redirect()->route('Get_Plan')->with('success','برنامه با موفقیت وارد شد');
        }else{
            return redirect()->route('Get_Plan')->with('error','خطای سیستمی لطفا دوباره سعی کنید');
        }
    }
    
    public function EditPlan($id){
        $Plan = HPP::find($id);
        return view('Admin.HistoryPlanPurpose.Plan.EditPlan',compact('Plan'));   
    }

    public function doEditPlan(Request $request,$id){
        $this->validate($request,
            ['New_Plan' => 'required'],
            ['New_Plan.required' => 'مقدار برنامه نباید خالی باشد']);

        $editedRecord=HPP::find($id);
        $editedRecord->hpp_data = $request->New_Plan;
        if($editedRecord->save()){
            return redirect()->route('Get_Plan')->with('success','برنامه با موفقیت ویرایش شد');
        }else{
            return redirect()->route('Get_Plan')->with('error','خطای سیستمی  لطفا دوباره سعی کنید');
        }
    }

    public function deletePlan($id){
        $Plan = HPP::find($id);
        if($Plan->delete()){
            return redirect()->route('Get_Plan')->with('success','برنامه با موفقیت حذف شد');
        }
        else{
            return redirect()->route('Get_Plan')->with('error','خطای سیستمی لطفا دوباره سعیکنید');   
        }
    }

}
