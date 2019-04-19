<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\ActivityTitle as ActTitle ;
use App\Model\SubActivityTitle;

class DoActivity extends Model
{
    protected  $table = 'activities_posts';

    public function getApstActivitiesTitleIdAttribute($value){
        $Category = ActTitle::find($value);
        return $this->attributes['apst_activities_title_id'] =$Category['attributes']['at_title'];;
    }

    public function getApstSubActivitiesTitleIdAttribute($value){
        if($value != null)
        {
            $SubCategory = SubActivityTitle::find($value);
            return $this->attributes['apst_sub_activities_title_id'] =$SubCategory['attributes']['sat_title'];
        }
        
    }
}
