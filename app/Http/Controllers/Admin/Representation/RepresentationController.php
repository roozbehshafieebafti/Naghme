<?php

namespace App\Http\Controllers\Admin\Representation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Model\Representation;
use App\Model\HistoryPlanePurpose as HPP;
use App\Model\Chart;
use App\Model\Authorities;
use App\Model\Duties;
use Illuminate\Support\Facades\Storage;

class RepresentationController extends Controller
{
    public function getRepresentation(){
        $Representation = Representation :: where('id','!=',1)->get();
        return view('Admin.Representation.Representation',compact('Representation'));
    }

    public function createRepresentation(){
        return view('Admin.Representation.NewRepresentation');
    }

    public function doCreateRepresentation(Request $request,Representation $representation){
        $this->validate($request,
                        ['New_Representation' => 'required'],
                        ['New_Representation.required' => 'ورود نام نمایندگی الزامی است']);
        $representation->representation_title = $request->New_Representation;
        if($representation->save()){
            return redirect()->route('Get_Representation')->with('success','نمایندگی با موفقیت اضافه شد');
        }
        else{
            return redirect()->route('Get_Representation')->with('error','خطای سیستمی لطفا دوباره سعی کنید');
        }
    }

    public function editRepresentation($id){
        $Representation = Representation::find($id);
        return view('Admin.Representation.EditRepresentation',compact('Representation'));
    }

    public function doEditRepresentation(Request $request,$id){
        $this->validate($request,
        ['New_Representation' => 'required'],
        ['New_Representation.required' => 'ورود نام نمایندگی الزامی است']);
        $Representation = Representation::find($id);
        $Representation->representation_title = $request->New_Representation;
        if($Representation->save()){
            return redirect()->route('Get_Representation')->with('success','نمایندگی با موفقیت ویرایش  شد');
        }
        else{
            return redirect()->route('Get_Representation')->with('error','خطای سیستمی لطفا دوباره سعی کنید');
        }
    }

    public function getHistory($id){
        $history = HPP::where([['hpp_kind','history'],['hpp_city_id',$id]])->get();
        return view('Admin.Representation.HistoryRepresentation',compact('history'));
    }

    public function createHistory(Request $request , $id){
        $this->validate($request,
                        ['HistoryData'=>'required'],
                        ['HistoryData.required'=>'مقدار تاریخچه بایستی وارد شود']);
        $hpp = HPP::find($id);
        if($hpp)
        {
            $hpp->hpp_data =  $request->HistoryData;
        }
        else{
            $hpp->hpp_kind = 'history';
            $hpp->hpp_city_id =  $id;
            $hpp->hpp_data =  $request->HistoryData;
        }
        
        if($hpp->save()){
            return redirect()->route('Get_Representation')->with('success','تاریخچه با موفقیت ثبت شد');
        }
        else{
            return redirect()->route('Get_Representation')->with('error','خطای سیستمی لطفا دوباره سعی کنید');
        }   
    }

    public function getChart($id){
        $DataChart = Chart::where('chart_city_id',$id)->first();
        return view('Admin.Representation.ChartRepresentation',compact('DataChart'));
    }

    public function updateChart(Request $request ,$id){
        $this->validate($request , 
                        ['Chart_data' => 'required',
                        'Chart_Picture' => 'file|mimes: jpg,png,jpeg|max:300'],
                        ['Chart_data.required' => 'مقدار توضیحات نباید خالی باشد',
                        'Chart_Picture.mimes'=>'نوع فایل بایستی jpg png یا jpeg باشد',
                        'Chart_Picture.max' => 'حجم فایل نباید بیشتر از 300kb باشد']);
        
        $ChartRecord = Chart::where('chart_city_id',$id)->first();
        if($ChartRecord){
            if(isset($request->Chart_Picture)){
                Storage::delete( $ChartRecord->chart_picture );
                $ChartPicture = $request->file('Chart_Picture')->store('files/chart');
                $ChartRecord->chart_picture = $ChartPicture;
            }
            $ChartRecord->chart_description = $request->Chart_data;
            if($ChartRecord->save()){
                return redirect()->route('Get_Representation')->with('success','نمودار با موفقیت بروزرسانی شد');
            }
            else{
                return redirect()->route('Get_Representation')->with('error','خطای سیستمی لطفا دوباره سعی کنید');
            }
        }
        else{
            $NewChart = new Chart();
            $NewChart->chart_city_id= $id;
            $ChartPicture = $request->file('Chart_Picture')->store('files/chart');
            $NewChart->chart_picture= $ChartPicture;
            $NewChart->chart_description= $request->Chart_data;
            if($NewChart->save()){
                return redirect()->route('Get_Representation')->with('success','نمودار با موفقیت بروزرسانی شد');
            }
            else{
                return redirect()->route('Get_Representation')->with('error','خطای سیستمی لطفا دوباره سعی کنید');
            }
        }
        

        
    }

    public function getAuthorities($id){
        $Authorities = Authorities::where('authorities_city_id',$id)->get();
        return view('Admin.Representation.AuthoritiesRepresentation',compact('Authorities','id'));
    }

    public function createAuthorities($id){
        return view('Admin.Representation.NewAuthorities',compact('id'));
    }

    public function doCreateAuthorities(Authorities $Authority , Request $request){
        //validation
        $this->validate($request, [
                    'Authorities_title' => 'required',
                    'Authorities_name' => 'required',
                    'Authorities_family' => 'required',
                    'Authorities_cv' => 'required',
            ],[
                'Authorities_title.required'=>'ورود سمت الزامی است',
                'Authorities_name.required'=>'ورود نام الزامی است',
                'Authorities_family.required'=>'ورود فامیل الزامی است',
                'Authorities_cv.required'=>'ورود رزومه الزامی است',
                ]);
        // Create a record
        $Authority->authorities_title = $request->Authorities_title;
        $Authority->authorities_name = $request->Authorities_name;
        $Authority->authorities_family = $request->Authorities_family;
        $Authority->authorities_cv = $request->Authorities_cv;
        $Authority->authorities_city_id = $request->CityId;

        //save the picture
        $picturePaht = $request->file('Authorities_picture')->store('picture/authorities');

        //check if saved
        if($picturePaht){

            $Authority->authorities_picture = $picturePaht;
            // Insert in database and check
            if($Authority->save()){
                return redirect()->route('Get_Representation_Authorities',$request->CityId)->with('success','مسئول جدید با موفقیت وارد شد');	
            }
            else{
                return redirect()->route('Get_Representation_Authorities',$request->CityId)->with('error','خطای سیستمی لطفا دوباره سعی کنید');	
            }
        }
        else{
            return redirect()->route('Get_Representation_Authorities',$request->CityId)->with('error','خطای سیستمی لطفا دوباره سعی کنید');	
        }
    }

    public function editAuthorities($id){
        $EditableAuthorities = Authorities::find($id);
    	return view('Admin.Representation.EditAuthorities' ,compact('EditableAuthorities','id'));
    }

    public function doEditAuthorities(Request $request , $id){
    	//validation
    	$this->validate($request, [
				'Authorities_title' => 'required',
				'Authorities_name' => 'required',
				'Authorities_family' => 'required',
				'Authorities_cv' => 'required',
		],[
			'Authorities_title.required'=>'ورود سمت الزامی است',
			'Authorities_name.required'=>'ورود نام الزامی است',
			'Authorities_family.required'=>'ورود فامیل الزامی است',
			'Authorities_cv.required'=>'ورود رزومه الزامی است',
			]);
    	//find Authority
    	$EditedAuthorities = Authorities::find($id);

    	//check if new picture is uploaded
    	if(is_uploaded_file($request->Authorities_picture)){
    		//delete the picture
    		Storage::delete($EditedAuthorities->authorities_picture);
    		//save the new picture
    		$NewPicturePath = $request->file('Authorities_picture')->store('picture/authorities');
    		$EditedAuthorities->authorities_picture = $NewPicturePath;
    	}
    	//Edit the record
    	$EditedAuthorities->authorities_title = $request->Authorities_title;
    	$EditedAuthorities->authorities_name = $request->Authorities_name;
    	$EditedAuthorities->authorities_family = $request->Authorities_family;
    	$EditedAuthorities->authorities_cv = $request->Authorities_cv;
    	//save and check if done
    	if($EditedAuthorities->save()){
    		return redirect()->route('Get_Representation')->with('success','مسئول با موفقیت ویرایش شد');
    	}
    	else{
    		return redirect()->route('Get_Representation')->with('error','خطای سیستمی لطفا دوباره سعی کنید');		
    	}
    }

    public function deleteAuthorities($cityId ,$id){
        $deletedRecord = Authorities::find($id);
		Storage::delete($deletedRecord->authorities_picture);
		Duties::where([['ad_authorities_title',$deletedRecord->authorities_title],['ad_authorities_city_id',$cityId]])->delete();
    	if($deletedRecord->delete()){
    		return back()->with('success','مسئول با موفقیت پاک شد');
    	}
    	else{
    		return back()->with('success','خطای سیستمی لطفا دوباره سعی کنید');	
    	}
    }
    
    public function getDuties($cityId,$dutyTitle){
        $Duties = Duties::where([['ad_authorities_title',$dutyTitle],['ad_authorities_city_id',$cityId]])->get();
        return view('Admin.Representation.AuthoritiesDuties', compact('cityId','dutyTitle','Duties'));
    }
    
    public function doCreateDuties(Request $request , $cityId, $dutyTitle){
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
                ['ad_authorities_city_id','=',$cityId]
            ])->count();
            
            // delete the duties that are store in database 
            if($DutyCount>0){
                Duties::where([
                    ['ad_authorities_title','=',$dutyTitle],
                    ['ad_authorities_city_id','=',$cityId]
                    ])->delete();
            }

            // Insert new fields in database
            foreach($DutiesList as $value){
                Duties::insert([
                            'ad_authorities_title'=>$dutyTitle,
                            'ad_authorities_duty'=>$value,
                            'ad_authorities_city_id'=>$cityId
                        ]);
            }
            
            return redirect()->route('Get_Representation')->with('success','وظایف با موفقیت ثبت شد');
        }else{
            return redirect()->route('Get_Representation')->with('error','حداقل یک رکورد باید ثبت شود');
        }
    }

    public function getInfo($cityId){
        $information = Representation::
                select("representation_leader","representation_address","representation_telephone")
                ->where("id",$cityId)
                ->get();
        return view('Admin.Representation.InformationRepresentaion',compact('information'));
    }

    public function updateInfo(Request $request,Representation $represent,$cityId){
        $representationSelect = $represent->find($cityId);

        $representationSelect->representation_telephone = $request->representation_telephone;
        $representationSelect->representation_leader = $request->representation_leader;
        $representationSelect->representation_address = $request->representation_address;

        if($representationSelect->save()){
            return redirect()->route('Get_Representation')->with('success','اطلاعات با موفقیت ثبت شد');
        }
        return redirect()->route('Get_Representation')->with('error','خطای سیستمی لطفا دوباره سعی کنید');
    }
}
