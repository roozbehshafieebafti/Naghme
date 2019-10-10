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
            SELECT authorities.id,
                authorities_title,
                authorities.authorities_name,
                authorities_family,
                authorities_picture,
                authorities_cv,
                ad_authorities_duty
            FROM  authorities
            LEFT JOIN authorities_duty
            ON (authorities.authorities_title = authorities_duty.ad_authorities_title AND authorities.authorities_city_id = authorities_duty.ad_authorities_city_id)
            WHERE authorities_city_id = '.$representation[0]->id
        );
        // dd($authorities);
        if(!$authorities){
            return view("errors/404");
        }

        $Authorities=[];
        $id=false;
        foreach($authorities as $values){
            if( $id==false){
                $Authorities=[
                    $values->id =>[
                        "id"=> $values->id,
                        "authorities_title"=> $values->authorities_title,
                        "authorities_name"=>  $values->authorities_name,
                        "authorities_family"=> $values->authorities_family,
                        "authorities_picture"=> $values->authorities_picture,
                        "authorities_cv"=> $values->authorities_cv,
                        "ad_authorities_duty"=> [$values->ad_authorities_duty]
                    ]
                ];
                $id=  $values->id;
            }
            elseif($id!=$values->id){
                $Authorities[$values->id] =[
                        "id"=> $values->id,
                        "authorities_title"=> $values->authorities_title,
                        "authorities_name"=>  $values->authorities_name,
                        "authorities_family"=> $values->authorities_family,
                        "authorities_picture"=> $values->authorities_picture,
                        "authorities_cv"=> $values->authorities_cv,
                        "ad_authorities_duty"=> [$values->ad_authorities_duty]
                    ];
                $id=  $values->id;
            }
            elseif($id == $values->id){
                $Authorities[$values->id]["ad_authorities_duty"][]=$values->ad_authorities_duty;
            }

        }
        // dd($Authorities);
        return view("Main/Representaion/RepresentaionReadMore",compact("represent","representation","Authorities"));
        
    }
}
