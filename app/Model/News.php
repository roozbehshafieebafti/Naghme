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
        $result = $DATE->g2p(date('Y',$value),date('m',$value),date('d',$value));
        return $result[0].'/'.$result[1].'/'.$result[2];
    }
}
