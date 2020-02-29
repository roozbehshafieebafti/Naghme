<?php

namespace App\Http\Controllers\Admin\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    // this methodes get all Reports from database
    public function getAllReports($id=1){
        $Page= $id;
        $limit = 10;
        $Reports = DB::select('SELECT * FROM questionnaire ORDER BY created_at DESC LIMIT ? , ?', [(intval($id)-1)*$limit,$limit]);
        $Count = DB::select('SELECT COUNT(*) AS total FROM questionnaire');
        return view("Admin/Reports/GetAllReports",compact("Reports","Count","limit","Page"));
    }

    // show create page
    public function createNewReports(){
        return view("Admin/Reports/CreateNewReport");
    }

    // create new Report
    public function doCreateNewReports(Request $request){
        $this->validate($request,['New_Report' => 'required'],['New_Report.required' => 'نام گزارش نباید خالی باشد']);
        $Insert = DB::insert('INSERT INTO questionnaire (name, activation,	created_at, updated_at ) values (?, ?,NOW(), NOW())', [$request->New_Report, 0]);
        if($Insert){
            return redirect()->route("Get_All_Reports")->with("success","عملیات با موفقیت انجام شد");
        }
        else{
            return redirect()->back()->with("error","خطا در انجام عملیات لطفا دوباره سعی کنید");
        }
    }

    // show edit page
    public function editReports($id){
        $editableReports = DB::select('SELECT name FROM questionnaire WHERE id = ?', [$id]);
        return view("Admin/Reports/EditReports",compact("editableReports"));
    }

    // edit selected Report
    public function doEditReports(Request $request, $id){
        $this->validate($request,['New_Report' => 'required'],['New_Report.required' => 'نام گزارش نباید خالی باشد']);
        $editedReport = DB::update('UPDATE questionnaire SET name = ? where id = ?', [$request->New_Report, $id]);
        if($editedReport){
            return redirect()->route("Get_All_Reports")->with("success","عملیات با موفقیت انجام شد");
        }
        else{
            return redirect()->back()->with("error","خطا در انجام عملیات لطفا دوباره سعی کنید");
        }
    }

    // delete selected Report
    public function deleteReports($id){
        $deletedReport = DB::delete('DELETE FROM questionnaire WHERE id=?', [$id]);
        if($deletedReport){
            return redirect()->route("Get_All_Reports")->with("success","عملیات با موفقیت انجام شد");
        }
        else{
            return redirect()->back()->with("error","خطا در انجام عملیات لطفا دوباره سعی کنید");
        }
    }

    // actve or deactive Report
    public function reportActivation($id,$activeStatus){
        $activeStatus == 0 ? $activeStatus = 1  : $activeStatus = 0 ;
        $ActivateReport = DB::update('UPDATE questionnaire SET activation = ? where id = ?', [$activeStatus, $id]);
        if($ActivateReport){
            return redirect()->route("Get_All_Reports");
        }
        else{
            return redirect()->back()->with("error","خطا در انجام عملیات لطفا دوباره سعی کنید");
        }
    }

    public function getQuestionerResult($id){
        $COUNT = DB::select('SELECT DISTINCT person_id from answers where questionnaire_id = ?', [$id]);
        $data = DB::select('SELECT * from answers where questionnaire_id = ?', [$id]);
        $rawQuestion = DB::select('SELECT * FROM questions WHERE questionnaire_id = ?', [$id]);
        $textAnswer = DB::select('SELECT * FROM answers_text WHERE questionnaire_id = ?  ORDER BY question_id', [$id]);
        $result=[];
        $questions = [];
        foreach($data as $value){
            if(array_key_exists($value->question_id,$result) ){
                $sum = $result[$value->question_id]["sum"] + $value->answer;
                $count = $result[$value->question_id]["count"]+1;

                $result[$value->question_id]= [
                    "sum" => $sum,
                    "count" => $count
                ];
            }
            else{
                $result[$value->question_id]= [
                    "sum" => $value->answer,
                    "count" => 1
                ];
            }
        };

        foreach($rawQuestion as $val){
            $questions[$val->id] =[ $val->name, $val->kind];
        }
        // dd($result,$questions,$textAnswer);
        return view('Admin/Reports/Result',compact('COUNT','textAnswer','result','questions'));
    }
}
