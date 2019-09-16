<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use \App\Calender\persian_calendar as Cal;

class News extends Model
{
    protected $table = 'news';

    // Time Mutator
    public function getNewsDateAttribute($value){
        $DATE = new Cal();
        $registerdDate = $this->dateValidation($value);
        $result = $DATE->g2p((int)$registerdDate["year"], (int)$registerdDate["month"], (int)$registerdDate["day"]);
        return $result[0].'/'.($result[1]>9 ? $result[1]: "0".$result[1]).'/'.($result[2]>9 ? $result[2]: "0".$result[2]);
    }

    private function dateValidation ($date){
        $year = $date[0].$date[1].$date[2].$date[3];
        $month = $date[5].$date[6];
        $day = $date[8].$date[9];

        if((!is_integer($year) AND $year<1380)) return ["status"=>false];
        if((!is_integer($month) AND $month>12)) return ["status"=>false];
        if((!is_integer($day) AND $day>31)) return ["status"=>false];
        
        return ["status"=>true, 'year'=> $year , "month" =>  $month , "day" => $day];
    }
}
