<?php

namespace App\Http\Controllers\Admin\Activities;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ActivityTitle as ActTitle ;
use App\Model\DoActivity ;
use App\Model\PostGallery ;
use Illuminate\Support\Facades\Storage;
use App\Model\SubActivityTitle;
use \Morilog\Jalali\Jalalian;

class DoActionController extends Controller
{
    //getPost
    public function getPost(){
        $title = ActTitle::all();
        $Page = isset($_GET['page']) ? $_GET['page'] : 1;
        $Count=null;
        $Posts=null;
        if(count($title)){
            $Posts =DoActivity::orderBy('apst_accure_date','desc')->offset(($Page-1)*10)->limit(10)->get();
            $Count = DoActivity::count();
        }
        return view('Admin.Activities.Posts.Posts', compact('title','Posts','Count','Page'));
    }

    //
    public function newPost(){
        $title = ActTitle::all();
        return view('Admin.Activities.Posts.NewPost',compact('title'));
    }

    public function getSubActivity($id){
        return SubActivityTitle::select('id','sat_title')->where('sat_parent_actitvity',$id)->get();
    }

    //
    public function createPost(Request $request,DoActivity $DoAct){
        $this->validate($request,
                        ['Post_tite' => 'required',
                        'Post_Date' => 'required',
                        'Post_First_Picture' => 'required',
                        'Post_Cover_Picture' => 'required',
                        'Post_Description' => 'required',
                        'Catigory' => 'integer',
                        ],
                        ['Post_tite.required' => 'عنوان نبایستی خالی باشد',
                        'Post_Date.required' => 'تاریخ وارد نشده است',
                        'Post_First_Picture.required' => 'فایل تصویر سربرگ بایستی انتخاب شود',
                        'Post_Cover_Picture.required' => 'فایل تصویر کاور بایستی انتخاب شود',
                        'Post_Description.required' => 'توضیحات نباید خالی باشد',
                        'Catigory.integer' => 'لطفا یک دسته بندی را انتخاب کنید'
                        ]);
        // date validation
        $dateValidationResut =$this->dateValidation($request->Post_Date);
        if(!$dateValidationResut["status"]){
            return redirect()->back()->with('danger','تاریخ اشتباه وارد شده است');
        }
        $date = (new Jalalian((int)$dateValidationResut["year"], (int)$dateValidationResut["month"], (int)$dateValidationResut["day"], 0, 0, 0))->toCarbon()->toDateTimeString() ;

        $titlePicture = $request->file('Post_First_Picture')->store('picture/post');
        $coverPicture = $request->file('Post_Cover_Picture')->store('picture/post');
        if($titlePicture){
            $DoAct->apst_activities_title_id = $request->Catigory;
            $DoAct->apst_sub_activities_title_id = $request->Sub_Catigory;
            $DoAct->apst_title = $request->Post_tite;
            $DoAct->apst_description = $request->Post_Description;
            $DoAct->apst_picture_of_title = $titlePicture;
            $DoAct->apst_picture_of_cover = $coverPicture;
            $DoAct->apst_accure_date = $date;

           if($DoAct->save()) {
                return redirect()->route('Get_Posts')->with('success','پست با موفقیت ثبت شد');
           }
           else{
                return redirect()->route('Get_Posts')->with('error','خطای سیستمی لطفا دوباره سعی کنید');
           }
        }
        else{
            return redirect()->route('Get_Posts')->with('error','خطای سیستمی لطفا دوباره سعی کنید');
        }
    }

    public function editPost($id){
        $Post = DoActivity::find($id);
        $title = ActTitle::all();
        $SubTitle =SubActivityTitle::where('sat_parent_actitvity',$Post['attributes']['apst_activities_title_id'])->get() ;
        return view('Admin.Activities.Posts.EditPost',compact('Post','title','SubTitle'));
    }

    public function doEditPost(Request $request , $id){
        $DoAct= DoActivity::find($id);
        $this->validate($request,
                        ['Post_tite' => 'required',
                        'Post_Description' => 'required',
                        ],
                        ['Post_tite.required' => 'عنوان نبایستی خالی باشد',
                        'Post_Description.required' => 'توضیحات نباید خالی باشد'
                        ]);
        // date validation
        $dateValidationResut =$this->dateValidation($request->Post_Date);
        if(!$dateValidationResut["status"]){
            return redirect()->back()->with('danger','تاریخ اشتباه وارد شده است');
        }
        $date = (new Jalalian((int)$dateValidationResut["year"], (int)$dateValidationResut["month"], (int)$dateValidationResut["day"], 0, 0, 0))->toCarbon()->toDateTimeString() ;

        if(isset($request->Post_First_Picture)){
            Storage::delete($DoAct->apst_picture_of_title);
            $titlePicture = $request->file('Post_First_Picture')->store('picture/post');
            $DoAct->apst_picture_of_title = $titlePicture;
        }
        if(isset($request->Post_Cover_Picture)){
            Storage::delete($DoAct->apst_picture_of_cover);
            $coverPicture = $request->file('Post_Cover_Picture')->store('picture/post');
            $DoAct->apst_picture_of_cover = $coverPicture;
        }
        $DoAct->apst_activities_title_id = $request->Catigory;
        $DoAct->apst_sub_activities_title_id = $request->Sub_Catigory;
        $DoAct->apst_title = $request->Post_tite;
        $DoAct->apst_description = $request->Post_Description;
        $DoAct->apst_accure_date = $date;
        if($DoAct->save()) {
            return redirect()->route('Get_Posts')->with('success','پست با موفقیت ثبت شد');
       }
       else{
            return redirect()->route('Get_Posts')->with('error','خطای سیستمی لطفا دوباره سعی کنید');
       }

    }

    //
    public function getPostGallery($id,$postName){
        $Gallery = PostGallery::where('apic_activities_posts_id', $id)->get();
        return view('Admin.Activities.Posts.PostGallery', compact('Gallery','postName','id'));
    }

    public function insertPostGallery(Request $request,$id){
        for($i=1;$i<=5;$i++){
            $Name = 'picture'.$i ;
            $Title = "Post_Picture_Title".$i;
            if(isset($request->$Name)){
                $Picture = $request->file($Name)->store('picture/gallery');
                $result = PostGallery::insert([
                    'apic_activities_posts_id' => $id ,
                    'apic_picture_name' => $Picture,
                    "apic_picture_title" => $request->$Title,
                    "created_at" => date("Y-m-d H:i:s"),
                    "updated_at" => date("Y-m-d H:i:s"),
                ]);
            }
        }
        return 1;
    }

    public function deletePostPicture($id){
        $Gallery = PostGallery::find($id);
        if(Storage::delete($Gallery->apic_picture_name)){
            $Gallery->delete();
            return back()->with('success','تصویر با موفقیت حذف شد');
        }
        else{
            return back()->with('error','خطای سیستمی');
        }
    }

    public function deletePost($id){
        $DeletedRecord  = DoActivity::find($id);
        $DeletePicture =  PostGallery::where('apic_activities_posts_id',$id)->get();
        if(count($DeletePicture) > 0){
            foreach($DeletePicture as $value){
                Storage::delete($value->apic_picture_name);
            }
        }
        Storage::delete($DeletedRecord->apst_picture_of_title);
        Storage::delete($DeletedRecord->apst_picture_of_cover);
        PostGallery::where('apic_activities_posts_id',$id)->delete();
        if($DeletedRecord->delete()){
            return back()->with('success','پست با موفقیت حذف شد');
        }
        return back()->with('error','پست با موفقیت حذف شد');
    }

    public function findPosts($item){
        $Post = DoActivity::select('apst_title')->where('apst_title','like','%'.$item.'%')->limit(10)->get();
        return $Post;
    }

    public function searchPosts($item){
        $Posts = DoActivity::where('apst_title','like','%'.$item.'%')->get();
        $search = 1;
        $title=[1,2];
        return view('Admin.Activities.Posts.Posts',compact('Posts','search','title'));
    }

    private function dateValidation ($date){
        $year = $date[0].$date[1].$date[2].$date[3];
        $month = $date[5].$date[6];
        $day = $date[8].$date[9];

        if((!is_integer($year) AND $year<1380)) return ["status"=>false];
        if((!is_integer($month) AND $month>12)) return ["status"=>false];
        if((!is_integer($day) AND $day>31)) return ["status"=>false];
        
        return ["status"=>true, 'year'=> $year , "month" =>  $month , "day" => $day];
    }
}
