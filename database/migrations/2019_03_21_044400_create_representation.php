<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepresentation extends Migration
{
    /*
        representation table store cities that starts to coaprte with organ
    */
    public function up()
    {
        Schema::create('representation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('representation_title',32);
            $table->string('representation_leader',128);
            $table->string('representation_leader',128);
            $table->text('representation_address');
            $table->string('representation_telephone',128);
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('representation');
    }
}
