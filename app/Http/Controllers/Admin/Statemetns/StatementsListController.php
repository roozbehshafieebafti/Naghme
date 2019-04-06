<?php

namespace App\Http\Controllers\Admin\Statemetns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\StatementsEthics\ES_title as ESt;
use App\Model\StatementsEthics\ES_list as ESl;

class StatementsListController extends Controller
{
    //getStatementsList sends title and sub statements list to view
    public function getStatementsList($id){
    	$StatementsTitle = ESt::select('set_title')->where('id',$id)->get();
    	$StatementsList = ESt::find($id)->ES_list;
    	return view('Admin.StatementsEthics.Statements.StatementsList',compact('StatementsList','StatementsTitle','id'));
    }

    //createNewStatementsList renders a page for creating a new statement list
    public function createNewStatementsList($id){
    	return view('Admin.StatementsEthics.Statements.NewStatementsList',compact('id'));
    }

    //doCreateNewStatementsList 
    public function doCreateNewStatementsList(Request $request,ESl $List,$id){
        //validation
    	$this->validate($request , 
                        ['New_Statement_list' => 'required'],
                        ['New_Statement_list.required' => 'مقدار بیانیه نباید خالی باشد' ] );

        //create a new row
        $List->sel_title_id = $id;
        $List->sel_description = $request->New_Statement_list;
        
        //save and chech if done
        if($List->save()){
            return redirect('/admin/statements/list/'.$id)->with('success','زیر بیانیه با موفقیت ایجاد شد');
        }
        else{
            return redirect('/admin/statements/list/'.$id)->with('error','خطای سیستمی لطفا دوباره سعی کنید');
        }
    }

    //deleteStatementsList
    public function deleteStatementsList($id){
        //finding record
        $DeletedRecord=ESl::find($id);

        //delete and check for done
        if($DeletedRecord->delete()){
            return redirect()->back()->with('success','زیر بیانیه با موفقیت حذف شد');
        }
        else{
            return redirect()->back()->with('error','خطای سیستمی لطفا دوباره سعی کنید');
        }
    }

    //editStatementsList renders page for editing Statements list
    public function editStatementsList($id){
        $EditableRecord = ESl::find($id);
        return view('Admin.StatementsEthics.Statements.EditStatementsList', compact('EditableRecord'));
    }

    //doEditStatementsList
    public function doEditStatementsList(Request $request, $id){
        //validation
        $this->validate($request,
                        ['New_Statement_list' => 'required'],
                        ['New_Statement_list.required' => 'زیربیانیه نباید خالی باشد']);
        //find record and edit
        $EditedRecord = ESl::find($id);
        $EditedRecord->sel_description = $request->New_Statement_list;

        //save and check if done
        if($EditedRecord->save()){
            return redirect('/admin/statements/list/'.$EditedRecord->sel_title_id)->with('success','بیانیه با موفقیت ویرایش شد');
        }
        else{
            return redirect('/admin/statements/list/'.$EditedRecord->sel_title_id)->with('error','خطای سیستمی لطفا دوبراه سعی کنید');
        }
    }
}
