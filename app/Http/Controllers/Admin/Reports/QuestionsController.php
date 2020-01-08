<?php

namespace App\Http\Controllers\Admin\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class QuestionsController extends Controller
{
    //get All questions
    public function getAllQuestions($id){
        $questions = DB::select('SELECT questions.id, questions.name AS Qname, questions.kind, questionnaire.name AS Rname, questions.questionnaire_id
                    FROM (questions INNER JOIN questionnaire ON questions.questionnaire_id = questionnaire.id) 
                    WHERE questionnaire.id = ? 
                    ORDER BY questions.kind 
                    ', [$id]);
        
        return view('Admin/Reports/questions/GetAllQuestions', compact('questions','id'));
    }

    // 
    public function createNewQuestions($id){
        return view('Admin/Reports/questions/CreateNewQuestions',compact("id"));
    }

    // 
    public function doCreateQuestions(Request $request,$id){
        $error = false;
        for($i=1;$i<=5;$i++){
            if($request["question".$i]== null){
                continue;
            }
            $set = DB::insert('INSERT INTO questions (questionnaire_id, name, kind, created_at, updated_at) values (?, ?, ?, NOW(), NOW())', [$id, $request["question".$i], $request["kind".$i]]);
            if($set){
                continue;
            }
            else{
                $error= true;
                break;
            }
        }

        if($error){
            return redirect()->back()->with("error","خطا در انجام عملیات لطفا دوباره سعی کنید");
        }
        else{
            return redirect()->route("Get_All_Questions",$id)->with("success","عملیات با موفقیت انجام شد");
        }
    }

    // 
    public function deleteQuestion($id, $question_id){
        $deletedQuestion = DB::delete('DELETE FROM questions WHERE id=? AND questionnaire_id=?', [$id, $question_id]);
        if($deletedQuestion){
            return redirect()->route("Get_All_Questions",$question_id)->with("success","عملیات با موفقیت انجام شد");
        }
        else{
            return redirect()->back()->with("error","خطا در انجام عملیات لطفا دوباره سعی کنید");
        }
    }

    // 
    public function editQuestion($id, $question_id){
        $editableQuestion = DB::select('SELECT * from questions where id=? AND questionnaire_id=?', [$id, $question_id]);
        return view('Admin\Reports\questions\EditQuestion' , compact('editableQuestion','question_id'));
    }

    public function doEditQuestion(Request $request, $id, $question_id){        
        $editableQuestion = DB::update('UPDATE questions set name = ? , kind = ? where id=? AND questionnaire_id=?', [$request->question, $request->kind, $id, $question_id]);
        if($editableQuestion){
            return redirect()->route("Get_All_Questions",$question_id)->with("success","عملیات با موفقیت انجام شد");
        }
        else{
            return redirect()->back()->with("error","خطا در انجام عملیات لطفا دوباره سعی کنید");
        }
    }
}
