<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChart extends Migration
{
    /*
        Organization chart
    */
    public function up()
    {
        Schema::create('chart', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('chart_city_id');
            $table->string('chart_picture',32);
            $table->text('chart_description')->nullable();
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
        Schema::dropIfExists('chart');
    }
}
