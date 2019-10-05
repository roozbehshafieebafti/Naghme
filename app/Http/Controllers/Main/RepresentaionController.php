<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Model\Representation;
use Illuminate\Support\Facades\DB;

class RepresentaionController extends Controller
{
    //
    public function getRepresentation(Representation $represent){
        $Representaions= "Representaion";
        $Represent = $represent->where('id','>',1)->get();
        
        return view("Main/Representaion/Representaion",compact("Representaions","Represent"));
    }

    public function representationReadMore($name){
        $represent = true;
        $representation = DB::select('
            SELECT representation.id,
                    representation_title,
                    representation_leader,
                    representation_address,
                    representation_telephone,
                    hpp_data,
                    chart_picture,
                    chart_description
            FROM ((representation 
            INNER JOIN history_purpose_plan 
            ON representation.id = history_purpose_plan.hpp_city_id)
            INNER JOIN  chart
            ON representation.id = chart.chart_city_id)
            WHERE representation_title = "'.$name.'"'
        );
        if(!$representation){
            return view("errors/404");
        }
        $authorities = DB::select('
            SELECT authorities_title,
                authorities.authorities_name,
                authorities_family,
                authorities_picture,
                authorities_cv,
                ad_authorities_duty
            FROM  authorities
            INNER JOIN authorities_duty
            ON authorities.id = authorities_duty.id
            WHERE authorities_city_id = '.$representation[0]->id
        );
        if(!$authorities){
            return view("errors/404");
        }
        return view("Main/Representaion/RepresentaionReadMore",compact("represent","representation","authorities"));
        
    }
}
