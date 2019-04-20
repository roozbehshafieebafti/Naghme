<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use \App\Model\Representation;

class NGO_User extends Model
{
    protected $table = 'naghme_user';

    public function getNaghmeUserLevelAttribute($value){
        $color = [];
        switch($value){
            case 1:
               $color = ["#FFDF00" , 'طلایی'];
               break;
            case 2:
               $color = ["#C0C0C0",'نقره‌ای'];
               break;
            case 3:
               $color = ["#cd7f32",'برنزی'];
               break;
        }
        return $color;
    }

    public function getNaghmeUserStatusAttribute($value){
        $color = '';
        switch($value){
            case 1:
               $color = "green";
               break;
            case 0:
               $color = "red";
               break;
        }
        return $color;
    }

    public function getNaghmeUserCityIdAttribute($value){
        $getRepresentation = Representation::find($value);
        return $getRepresentation['attributes']['representation_title'];
    }

    public function getNaghmeUserKindAttribute($value){
        $Kind = '';
        switch($value){
            case 1:
                $Kind ='پیوسته 1';
                break;
            case 2:
                $Kind ='پیوسته 2';
                break;
            case 3:
                $Kind ='پیوسته 3';
                break;
            case 4:
                $Kind ='وابسته 1';
                break;
            case 5:
                $Kind ='وابسته 2';
                break;
            case 6:
                $Kind ='دوستدار هنر';
                break;
        }

        return $Kind;
    }
}
