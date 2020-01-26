<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RecallController extends Controller
{
    // get data for dispaly recall for user
    public function getRecalls($id,$name){
        $Recalls = DB::select('SELECT * FROM recall_pictures WHERE id = ? AND name=?', [$id,$name]);        
        // the values that should be sent to view
        $User = Auth::user();
        $isAuth = false;
        $recall = true; #مربوط به آمدن نام فراخوان در هدر سایت
        $UserData = [];
        $pictureData = [];
        $UserWorks = [];
        $isSubmited = false;
        // user is login        
        if($User){
            $isAuth = true;
            $submition = DB::select('SELECT * FROM reacll_pictures_submit WHERE recall_id=? AND user_id=?', [$id,$User['attributes']['id']]);
            // user NOT submited the form
            if(!$submition){
                // get user data
                $UserData = DB::select('SELECT * FROM user_information WHERE user_id = ?', [$User['attributes']['id']]);
                // user has data
                if($UserData){
    
                    $UserWorks = DB::select('SELECT * FROM reacll_pictures_data WHERE recall_id = ? AND user_id=? AND is_deleted=0 ORDER BY created_at DESC',[$id , $User['attributes']['id'] ]);
                    // dd($UserWorks );
                }          

            }
            else{
                $isSubmited = true;
            }
        }
        return view('Main.Recalls.Recalls',compact('id','Recalls','recall','isAuth','isSubmited','UserData','User','pictureData','UserWorks'));
    }

    // 
    public function doCreateUserInformation(Request $request){
        if(!Auth::user()){  
            return response()->json(["data"=>"شما برای انجام این عملیات صلاحیت ندارید"],401);
        }

        $UserData = DB::select('SELECT id FROM user_information WHERE user_id = ?', [$request->userId]);
        if($UserData){
            return response()->json(["data" => "اطلاعات این کاربر قبلا ثبت شده است"],400,["Content-Type"=> "application\json"]);
        }
        $userInfo = DB::insert('INSERT INTO user_information 
                                (user_id,
                                national_code,
                                birth_date,
                                birth_location,
                                phone_number,
                                constant_number,
                                address,
                                major,
                                education_level,
                                univercity,
                                brife_art_expirences,
                                created_at,
                                updated_at)
                                values (?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW())',
                                [
                                    $request->userId ,
                                    $request->nationalCode ,
                                    $request->birthDate ,
                                    $request->birthLocation ,
                                    $request->phoneNumber ,
                                    $request->constantNumber ,
                                    $request->address ,
                                    $request->major ,
                                    $request->levelOfEducation ,
                                    $request->univercityName ,
                                    $request->brifeArtActions,
                                ]
                            );
        if($userInfo){
            return response()->json(["data" => "اطلاعات با موفقیت ثبت شد"],200,["Content-Type"=> "application\json"]);
        }
        else{
            return response()->json(["data" => "خطایی در سیستم به وجود آمده است لطفا به مدیر سیستم اطلاع دهید"],500,["Content-Type"=> "application\json"]);
        }
    }

    public function doCreateUserWorks(Request $request){
        if(!Auth::user()){  
            return response()->json(["data"=>"شما برای انجام این عملیات صلاحیت ندارید"],401);
        }
        $this->validate($request,[
            "title"=>"required|max:100",
            "productionData"=>"required|max:10",
            "workSize"=>"required|max:100",
            "workTechniuqe"=>"required|max:100",
            "workStatments"=>"required|max:100",
            "file"=>"required|mimes: gif,GIF,jpeg,JPEG,png,PNG,jpg,JPG",
            "recallId" => "required",
            "uploadUserId" => "required"
        ]);
        //  check the number of works that should be under 12
        $CountUserWorks = DB::select('SELECT COUNT(*) as total FROM reacll_pictures_data WHERE recall_id = ? AND user_id=? AND is_deleted=0 ',[$request->recallId , $request->uploadUserId ]);
        if(isset($CountUserWorks)){
            if($CountUserWorks[0]->total >12){
                return response()->json(["data"=>"تعداد عکس های بارگذاری شده به حد نصاب رسیده است، امکان بارگذاری وجود ندارد"],402);
            }
        }
        else{
            return response()->json(["data"=>"خطای سیستمی، فایل ذخیره نشد، لطفا با مدیر سیستم تماس حاصل نمایید"],500);
        }
        
        $saveFile = $request->file('file')->store('picture/recall/'.strval($request->recallId).'/'.strval($request->uploadUserId));
        if($saveFile){
            $insertData = DB::insert('INSERT INTO reacll_pictures_data 
                                    (user_id, recall_id, title, production_date, size, technique, statements, picture, created_at, updated_at) 
                                    values 
                                    (?,?,?,?,?,?,?,?,NOW(),NOW())', 
                                    [
                                        $request->uploadUserId,
                                        $request->recallId,
                                        $request->title,
                                        $request->productionData,
                                        $request->workSize,
                                        $request->workTechniuqe,
                                        $request->workStatments,
                                        $saveFile,
                                    ]);
            if($insertData){
                return response()->json(["data"=>"فایل با موفقیت بارگذاری شد"],200);
            }
            else{
                return response()->json(["data"=>"خطای سیستمی، اطلاعات ذخیره نشد، لطفا با مدیر سیستم تماس حاصل نمایید"],500);    
            }
        }
        else{
            return response()->json(["data"=>"خطای سیستمی، فایل ذخیره نشد، لطفا با مدیر سیستم تماس حاصل نمایید"],500);
        }
    }

    public function getAllUsersPicture($userId,$recallId){
        if(Auth::user()){   
            $UserWorks = DB::select('SELECT * FROM reacll_pictures_data WHERE recall_id = ? AND user_id=? AND is_deleted=0 ORDER BY created_at DESC',[$recallId , $userId ]);
            return response()->json($UserWorks,200,['Content-Type'=>'application/json']);
        }
        else{
            return response()->json(["data"=>"شما برای انجام این عملیات صلاحیت ندارید"],401);
        }
    }

    public function deleteUserWork($workId){
        if(Auth::user()){            
            $deletedWork = DB::update('UPDATE reacll_pictures_data SET is_deleted = 1 where id = ?', [$workId]);
            if($deletedWork){
                return response()->json(["data"=>"عملیات با موفقیت انجام شد"],200);
            }
            else{
                return response()->json(["data"=>"خطای سیستمی،لطفا با مدیر سیستم تماس بگیرید"],500);
            }
        }
        else{
            return response()->json(["data"=>"شما برای انجام این عملیات صلاحیت ندارید"],401);
        }
    }

    public function finallSubmition($userId,$recallId){
        if(Auth::user()){            
            $submition = DB::insert('INSERT INTO reacll_pictures_submit (recall_id, user_id, created_at ,updated_at) values (?, ?, NOW(), NOW())', [$recallId,$userId]);
            if($submition){
                return response()->json(["data"=>"عملیات با موفقیت انجام شد"],200);
            }
            else{
                return response()->json(["data"=>"خطای سیستمی، لطفا با مدیر سیستم تماس بگیرید"],500);
            }
        }
        else{
            return response()->json(["data"=>"شما برای انجام این عملیات صلاحیت ندارید"],401);
        }
    }
}
