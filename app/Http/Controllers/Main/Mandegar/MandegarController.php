<?php

namespace App\Http\Controllers\Main\Mandegar;
use App\Http\Controllers\Controller;
use App\Model\HistoryPlanePurpose;
use Illuminate\Support\Facades\DB;

class MandegarController extends Controller
{
    public function getHistoryPlanPurposeStatements(){
        $History = HistoryPlanePurpose::select('hpp_data')->where([['hpp_kind','history'],['hpp_city_id',1]])->get();
        $Plane =  HistoryPlanePurpose::select('hpp_data')->where([['hpp_kind','plan'],['hpp_city_id',1]])->get();
        $Purpose =  HistoryPlanePurpose::select('hpp_data')->where([['hpp_kind','purpose'],['hpp_city_id',1]])->get();
        $RawStatements = DB::select('SELECT 
        set_title , sel_description 
        FROM statements_ethics_title LEFT JOIN statements_ethics_lists 
        ON statements_ethics_title.id = statements_ethics_lists.sel_title_id 
        WHERE statements_ethics_title.set_kind = "Statements"
        ');
        $Statement= [];
        foreach($RawStatements as $value)
        {
            $Statement[$value->set_title][] =$value->sel_description;
        }
        return View('Main.HistoryPlanePuroseState.HistoryPlanePuroseState',compact('History','Plane','Purpose','Statement'));
    }
}
