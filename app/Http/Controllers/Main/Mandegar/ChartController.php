<?php

namespace App\Http\Controllers\Main\Mandegar;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    //
    public function getChart($cityName){
        $chart = DB::select('SELECT representation_title, chart_picture, chart_description
        FROM representation INNER JOIN chart ON representation.id = chart.chart_city_id 
        WHERE representation.representation_title = "'.$cityName.'"' );

        return view('Main.Chart.Chart',compact('chart'));
    }
}
