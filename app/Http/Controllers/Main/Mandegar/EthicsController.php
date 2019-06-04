<?php

namespace App\Http\Controllers\Main\Mandegar;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EthicsController extends Controller
{
    //
    public function getEthics(){
        $RawEthics = DB::select('SELECT 
        set_title , sel_description 
        FROM statements_ethics_title LEFT JOIN statements_ethics_lists 
        ON statements_ethics_title.id = statements_ethics_lists.sel_title_id 
        WHERE statements_ethics_title.set_kind = "Ethics"
        ');
        $Ethics= [];
        foreach($RawEthics as $value)
        {
            $Ethics[$value->set_title][] =$value->sel_description;
        }
        
        return view('Main.Ethics.Ethics',compact('Ethics'));
    }
}
