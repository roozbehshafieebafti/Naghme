<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    //
    public function getQuestionnaire($questionnaireId,$name){
        $Active = false;
        $questions= [];

        $Active = DB::select('SELECT questionnaire.activation from questionnaire where id = ?', [$questionnaireId]);
        if($Active && $Active[0]->activation== 1){
            $questions = DB::select('SELECT * FROM questions
                        WHERE questionnaire_id = ? 
                        ORDER BY questions.kind , questions.id ASC
                        ', [$questionnaireId]);
        }

        return view('Main.Report.Report',compact('questionnaireId','name','Active','questions'));
    }

    public function submitQuestionsForm(Request $request){
        $personID = rand();
        foreach($request->data as $value){
            if($value['value'] != ""){
                DB::insert('INSERT INTO 
                    answers (person_id , questionnaire_id, question_id, answer, created_at, updated_at) 
                    values (?,?, ?, ?, NOW(), NOW())',
                    [$personID,$request->questionnaireId, $value['id'] , $value['value']]);
            }
        }
        if($request->text['value']!=""){
            DB::insert('INSERT INTO 
                answers_text (questionnaire_id, question_id, answer, created_at, updated_at) 
                values (?, ?, ?, NOW(), NOW())',
                [$request->questionnaireId, $request->text['id'] , $request->text['value']]);
        }
        return response()->json($request,200);
    }
}
