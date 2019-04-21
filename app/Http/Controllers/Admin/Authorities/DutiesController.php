<?php

namespace App\Http\Controllers\Admin\Authorities;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Authorities;
use App\Model\Duties;

class DutiesController extends Controller
{
	//getDuties collect the titles from Authorities table and sends them to view
    public function getDuties(){
    	$AuthoritiesTitle = Authorities::select('id','authorities_title')->where('authorities_city_id',1)->distinct()->get();
    	return view('Admin.Authorities.Duties.Duties',compact('AuthoritiesTitle'));
    }

    //createDuties Renders a Page for create new Duties
    public function createDuties($dutyTitle){
    	$Duties = Duties::where([['ad_authorities_title',$dutyTitle],['ad_authorities_city_id',1]])->get();
    	return view('Admin.Authorities.Duties.DutiesList',compact('Duties','dutyTitle'));
    }

    //doCreateDuties
    public function doCreateDuties(Request $request , $dutyTitle){
        //store duties fields in an array
        $DutiesList=[];
        for($i=0;$i<30;$i++)
        {
            $name='Duty_'.$i;
            if(trim($request->$name)!=null){
                $DutiesList[]=trim($request->$name);
            }
        }

        //at list one duty should be fill
        if(count($DutiesList)>0){

            //count how many duties are stored in database
            $DutyCount = Duties::where([
                ['ad_authorities_title','=',$dutyTitle],
                ['ad_authorities_city_id','=',1]
            ])->count();
            
            // delete the duties that are store in database 
            if($DutyCount>0){
                Duties::where([
                    ['ad_authorities_title','=',$dutyTitle],
                    ['ad_authorities_city_id','=',1]
                    ])->delete();
            }

            // Insert new fields in database
            foreach($DutiesList as $value){
                Duties::insert([
                            'ad_authorities_title'=>$dutyTitle,
                            'ad_authorities_duty'=>$value,
                            'ad_authorities_city_id'=>1
                        ]);
            }
            
            return redirect()->route('Get_Duties')->with('success','وظایف با موفقیت ثبت شد');
        }else{
            return redirect()->route('Get_Duties')->with('error','حداقل یک رکورد باید ثبت شود');
        }
    }
}