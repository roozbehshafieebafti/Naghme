<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

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
}
