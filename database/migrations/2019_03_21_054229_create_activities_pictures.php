<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesPictures extends Migration
{
    /*
        activities_pictures table, it contains picture gallery of activities
     */
    public function up()
    {
        Schema::create('activities_pictures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('apic_activities_posts_id');
            $table->string('apic_picture_name',96);
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
        Schema::dropIfExists('activities_pictures');
    }
}
