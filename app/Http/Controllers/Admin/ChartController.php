<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Chart;

class ChartController extends Controller
{
    //
    public function getChart(){
        $DataChart = Chart::where('chart_city_id',0)->first();
        // dd($DataChart);
        return view('Admin.Chart.Chart',compact('DataChart'));
    }

    //
    public function updateChart(Request $request){
        $this->validate($request , 
                        ['Chart_data' => 'required'],
                        ['Chart_data.required' => 'مقدار توضیحات نباید خالی باشد']);
        
        $ChartRecord = Chart::find(1);

        if(isset($request->Chart_Picture)){
            $ChartPicture = $request->file('Chart_Picture')->store('files/chart');
            $ChartRecord->chart_picture = $ChartPicture;
        }
        $ChartRecord->chart_description = $request->Chart_data;

        if($ChartRecord->save()){
            return redirect()->route('Get_Chart')->with('success','نمودار با موفقیت بروزرسانی شد');
        }
    }
}
