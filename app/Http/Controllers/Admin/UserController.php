<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NGO_User as User ;

class UserController extends Controller
{
    //getUsers
    public function getUsers(){
        $Page = isset($_GET['page'])? $_GET['page'] : 1;
        $Users = User::orderBy('created_at','desc')->offset(($Page-1)*10)->limit(10)->get();
        $Count = User::count();
        return view('Admin.Users.Users',compact('Users','Count','Page'));
    }

    //createUsers
    public function createUsers(){
        return view('Admin.Users.NewUser');
    }

    //
    public function doCreateUser(Request $request , User $user){
        $this->validate($request,
                        ['User_name'=>'required | string',
                        'User_family'=>'required | string',
                        'User_level'=>'required',
                        'User_Status'=>'required ',
                        'User_kind'=>'required | string',
                        'User_id'=>'required | integer',
                        'User_Activity'=>'required | string'
                        ]
                        ,['User_name.required'=>'ورود نام اجباری است',
                        'User_name.string'=>'نام باید به صورت رشته باشد',
                        'User_family.required'=>'ورود فامیل اجباری است',
                        'User_family.string'=>'فامیل باید به صورت رشته باشد',
                        'User_kind.required'=>'ورود نوع عضویت اجباری است',
                        'User_kind.string'=>'نوع فعالیت باید به صورت رشته باشد',
                        'User_id.required'=>'ورود شماره عضویت اجباری است',
                        'User_id.integer'=>'شماره عضویت باید عدد باشد',
                        'User_Activity.required'=>'زمینه فعالیت اجباری است',
                        'User_Activity.string' => 'زمینه فعالیت باید از نوع رشته باشد'
                        ]);
        $user->naghme_user_id_card = $request->User_id;
        $user->naghme_user_name = $request->User_name;
        $user->naghme_user_family = $request->User_family;
        $user->naghme_user_kind = $request->User_kind;
        $user->naghme_user_level = $request->User_level;
        $user->naghme_user_activity = $request->User_Activity;
        $user->naghme_user_status = $request->User_Status;

        if($user->save()){
            return redirect()->route('Get_User')->with('success','عضو جدید با موفقیت ثبت شد');
        }
    }

    //
    public function editUser($id){
        $User = User::find($id);
        return view('Admin.Users.EditUser',compact('User'));
    }

    //
    public function doEditUser(Request $request, $id){
        $user = User::find($id);
        $this->validate($request,
                        ['User_name'=>'required | string',
                        'User_family'=>'required | string',
                        'User_level'=>'required',
                        'User_Status'=>'required ',
                        'User_kind'=>'required | string',
                        'User_id'=>'required | integer',
                        'User_Activity'=>'required | string'
                        ]
                        ,['User_name.required'=>'ورود نام اجباری است',
                        'User_name.string'=>'نام باید به صورت رشته باشد',
                        'User_family.required'=>'ورود فامیل اجباری است',
                        'User_family.string'=>'فامیل باید به صورت رشته باشد',
                        'User_kind.required'=>'ورود نوع عضویت اجباری است',
                        'User_kind.string'=>'نوع فعالیت باید به صورت رشته باشد',
                        'User_id.required'=>'ورود شماره عضویت اجباری است',
                        'User_id.integer'=>'شماره عضویت باید عدد باشد',
                        'User_Activity.required'=>'زمینه فعالیت اجباری است',
                        'User_Activity.string' => 'زمینه فعالیت باید از نوع رشته باشد'
                        ]);
        $user->naghme_user_id_card = $request->User_id;
        $user->naghme_user_name = $request->User_name;
        $user->naghme_user_family = $request->User_family;
        $user->naghme_user_kind = $request->User_kind;
        $user->naghme_user_level = $request->User_level;
        $user->naghme_user_activity = $request->User_Activity;
        $user->naghme_user_status = $request->User_Status;

        if($user->save()){
            return redirect()->route('Get_User')->with('success','ویرایش با موفقیت انجام شد');
        }
    }

    //
    public function deleteUser($id){
        $User = User::find($id);
        if($User->delete()){
            return redirect()->route('Get_User')->with('success','حذف با موفقیت انجام شد');
        }
    }

    //
    public function findUser($item){
        $User = User::select('naghme_user_name','naghme_user_family')
                    ->where('naghme_user_name','like','%'.$item.'%')
                    ->orWhere('naghme_user_family','like','%'.$item.'%')
                    ->limit(10)->get();
        return $User;
    }

    //
    public function searchUser($item){
        $Arry = explode(" ",$item);
        if(count($Arry)>1){
            $Users = User::where('naghme_user_name','like','%'.$Arry[0].'%')
                    ->orWhere('naghme_user_family','like','%'.$Arry[1].'%')
                    ->get();
        }else{
            $Users = User::where('naghme_user_name','like','%'.$Arry[0].'%')
                    ->orWhere('naghme_user_family','like','%'.$Arry[0].'%')
                    ->get();
        }
        
        $search = 1;
        return view('Admin.Users.Users',compact('Users','search'));
    }
}
