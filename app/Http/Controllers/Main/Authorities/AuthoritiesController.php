<?php

namespace App\Http\Controllers\Main\Authorities;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AuthoritiesController extends Controller
{
    //
    public function getAuthorities($title){

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
            WHERE authorities_city_id = 1 AND authorities_unit_title= "'.$title.'"
            ORDER BY  authorities.id ASC'
        );        

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

        return view('Main.Authorities.Authorities',compact('Authorities','title'));
    }
}
