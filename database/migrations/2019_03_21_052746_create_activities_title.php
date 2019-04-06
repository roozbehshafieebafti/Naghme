<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTitle extends Migration
{
    /*
        activities_title includes categories of activities
            this table has one => many relationship whit activities_posts
    */
    public function up()
    {
        Schema::create('activities_title', function (Blueprint $table) {
            $table->increments('id');
            $table->string('at_title',32);
            $table->text('at_description');
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
        Schema::dropIfExists('activities_title');
    }
}
