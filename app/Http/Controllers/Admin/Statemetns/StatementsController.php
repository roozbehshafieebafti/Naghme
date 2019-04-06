<?php

namespace App\Http\Controllers\Admin\Statemetns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\StatementsEthics\ES_title as ESt;
use App\Model\StatementsEthics\ES_list as ESl;

class StatementsController extends Controller
{
    //getStatementsTitle sends title of statements to Statements view
    public function getStatementsTitle(){
    	$StatementsTitle = ESt::where('set_kind','Statements')->get();
    	return view('Admin.StatementsEthics.Statements.Statements',compact('StatementsTitle'));
    }

    //newStatements renders create new starements page
    public function newStatements(){
    	return view('Admin.StatementsEthics.Statements.NewStatements');
    }

    //createNewStatements insert new statements in database
    public function createNewStatements(Request $request , ESt $Statements){
    	//validation
    	$this->validate($request , 
    					['New_Statement' => 'required'],
    					['New_Statement.required' => 'بیانیه نباید خالی باشد']);
    	//زinsert new statements in database
    	$Statements->set_kind = 'Statements';
    	$Statements->set_title = $request->New_Statement;

    	// save and check if done
    	if($Statements->save()){
    		return redirect()->route('Statements_Title')->with('success','بیانیه با موفقیت ثبت شد');
    	}
    	else{
    		return redirect()->route('Statements_Title')->with('success','خطای سیستمی لطفا دوباره سعی کنید');	
    	}
    }

    //deleteStatements remove statements record from database
    public function deleteStatements($id){
    	//delete Statements Lists
    	ESl::where('sel_title_id',$id)->delete();

    	//delete Statements
    	$Statements_deleted = ESt::where('id',$id)->delete();
    	if($Statements_deleted){
    		return redirect()->back()->with('success','بیانیه با موفقیت حذف شد');
    	}
    	else{
    		return redirect()->back()->with('error','خطای سیستمی  لطفا دوباره سعی کنید');	
    	}
    }

    //editStatementsPage renders Edit page for Statements
    public function editStatementsPage($id){
    	$EditableStatements = ESt::find($id);
    	return view('Admin.StatementsEthics.Statements.EditStatements',compact('EditableStatements'));
    }

    //doEditStatements Edits new value for Statements
    public function doEditStatements(Request $request ,$id){
    	//validation
    	$this->validate($request , 
    					['New_Statement' => 'required'],
    					['New_Statement.required' => 'بیانیه نباید خالی باشد']);
    	
    	//find and eidt
    	$Statements = ESt::find($id);
    	$Statements->set_title = $request->New_Statement;
    	$ditedStatements=$Statements->save();

    	//check if done or not
    	if($ditedStatements){
    		return redirect()->route('Statements_Title')->with('success','بیانیه با موفقیت ویرایش شد');
    	}
    	else{
    		return redirect()->route('Statements_Title')->with('error','خطای سیستمی لطفا دوباره سعی کنید');	
    	}
    }
}
