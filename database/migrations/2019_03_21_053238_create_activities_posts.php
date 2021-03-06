<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesPosts extends Migration
{
    /*
        activities_posts includes the new post of activities 
            this table has one=>many relationship with activities_pictures
    */
    public function up()
    {
        Schema::create('activities_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('apst_activities_title_id');
            $table->integer('apst_sub_activities_title_id')->nullable();
            $table->string('apst_title',64);
            $table->text('apst_description');
            $table->text('apst_second_description')->nullable();
            $table->string('apst_picture_of_title',96);
            $table->string('apst_picture_of_title_mobile',96);
            $table->string('apst_picture_of_cover',96);
            $table->boolean('apst_is_cover_picture_landscape');
            $table->text('apst_video')->nullable();
            $table->string('apst_accure_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities_posts');
    }
}
