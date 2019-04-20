<?php

namespace App\Http\Controllers\Admin\Representation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Model\Representation;
use App\Model\HistoryPlanePurpose as HPP ;
use App\Model\Chart;
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
}
