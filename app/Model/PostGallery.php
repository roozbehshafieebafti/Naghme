<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostGallery extends Model
{
    protected $table = 'activities_pictures';
    public $timestamps = true;
    protected $fillable = [
        'apic_activities_posts_id', 'apic_picture_name', 'apic_picture_title',
    ];
}
