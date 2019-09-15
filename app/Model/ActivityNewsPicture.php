<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ActivityNewsPicture extends Model
{
    protected $table = 'activities_news_picture';
    public $timestamps = true;
    protected $fillable = [
        'activities_posts_id', 'picture_name', 'picture_title',
    ];
}
