<?php

namespace App\Http\Controllers\Admin\Recalls;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WhoRegisterdInRecallController extends Controller
{
    //
    public function getWhoRegisterd($recalId, $recallName, $page=1){

        $Page= $page;
        $limit = 10;
        $WhoRegistered = DB::select('SELECT recall_id,
                                            user_id,
                                            users.id,
                                            users.name,
                                            users.family,
                                            users.email                                  
                                    FROM
                                        (SELECT DISTINCT 
                                         recall_id, user_id
                                         FROM reacll_pictures_data
                                         WHERE recall_id ='.$recalId.')
                                    INNNER JOIN users ON (user_id = users.id)
                                    LIMIT ? , ?',[(intval($Page)-1)*$limit,$limit]);
        $count = DB::select('SELECT DISTINCT 
                            recall_id, user_id
                            FROM reacll_pictures_data
                            WHERE recall_id = ?',[$recalId]);
        $Count = count($count);
        return view('Admin.Recalls.WhoRegisterd.GetAllRegisterdBody', compact('recalId','recallName','WhoRegistered','Count','limit','Page'));
    }

    public function getUserWorks($recallId,$userId, $name, $family){
        $Works = DB::select('SELECT * FROM reacll_pictures_data WHERE recall_id = ? AND user_id = ? ORDER BY is_deleted ASC',[$recallId, $userId]);
        $IsSubmited = DB::select('SELECT * FROM reacll_pictures_submit WHERE recall_id = ? AND user_id = ?',[$recallId, $userId]);
        
        return view('Admin.Recalls.WhoRegisterd.GetUserWorks', compact('recallId','userId','Works','IsSubmited','name','family'));
    }
}
