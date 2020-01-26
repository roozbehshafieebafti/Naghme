<?php

namespace App\Http\Controllers\Admin\Recalls;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RecallsController extends Controller
{
    //
    public function getRecalls($id=1){
        $Page= $id;
        $limit = 10;
        $Recalls = DB::select('SELECT * FROM recall_pictures ORDER BY created_at DESC LIMIT ? , ?', [(intval($id)-1)*$limit,$limit]);
        $Count = DB::select('SELECT COUNT(*) AS total FROM recall_pictures');
        return view('Admin.Recalls.Recalls',compact("Recalls","Count","limit","Page"));
    }

    public function createRecall(){
        return view('Admin.Recalls.CreateRecall');
    }

    public function doCreateRecall(Request $request){
        $this->validate($request,['New_Recall' => 'required'],['New_Recall.required' => 'نام فراخوان نباید خالی باشد']);
        $hasThisName = DB::select('SELECT * FROM recall_pictures WHERE name = ?', [$request->New_Recall]);
        if($hasThisName){
            return redirect()->back()->with("error","خطا، نام فراخوان نباید تکراری باشد");
        }
        $Insert = DB::insert('INSERT INTO recall_pictures (name, activation, created_at, updated_at ) values (?, ?,NOW(), NOW())', [$request->New_Recall, 0]);
        if($Insert){
            return redirect()->route("Get_Recalls")->with("success","عملیات با موفقیت انجام شد");
        }
        else{
            return redirect()->back()->with("error","خطا در انجام عملیات لطفا دوباره سعی کنید");
        }
    }

    public function editRecall($id){
        $editableRecalls = DB::select('SELECT name FROM recall_pictures WHERE id = ?', [$id]);
        return view("Admin/Recalls/EditRecall",compact("editableRecalls"));
    }

    public function doEditRecall(Request $request, $id){
        $this->validate($request,['New_Recall' => 'required'],['New_Recall.required' => 'نام فراخوان نباید خالی باشد']);
        $hasThisName = DB::select('SELECT * FROM recall_pictures WHERE name = ?', [$request->New_Recall]);
        if($hasThisName){
            return redirect()->back()->with("error","خطا، نام فراخوان نباید تکراری باشد");
        }
        $editedRecall = DB::update('UPDATE recall_pictures SET name = ? where id = ?', [$request->New_Recall, $id]);
        if($editedRecall){
            return redirect()->route("Get_Recalls")->with("success","عملیات با موفقیت انجام شد");
        }
        else{
            return redirect()->back()->with("error","خطا در انجام عملیات لطفا دوباره سعی کنید");
        }
    }

    public function deleteRecall($id){
        $deletedRecall = DB::delete('DELETE FROM recall_pictures WHERE id=?', [$id]);
        if($deletedRecall){
            return redirect()->route("Get_Recalls")->with("success","عملیات با موفقیت انجام شد");
        }
        else{
            return redirect()->back()->with("error","خطا در انجام عملیات لطفا دوباره سعی کنید");
        }
    }

    public function recallActivation($id,$activeStatus){
        $activeStatus == 0 ? $activeStatus = 1  : $activeStatus = 0 ;
        $ActivateRecall = DB::update('UPDATE recall_pictures SET activation = ? where id = ?', [$activeStatus, $id]);
        if($ActivateRecall){
            return redirect()->route("Get_Recalls");
        }
        else{
            return redirect()->back()->with("error","خطا در انجام عملیات لطفا دوباره سعی کنید");
        }
    }
}
