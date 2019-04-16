<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorities extends Migration
{
    /*
        authorities table stors personel information
     */
    public function up()
    {
        Schema::create('authorities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('authorities_title_id',32);
            $table->string('authorities_name',32);
            $table->string('authorities_family',32);
            $table->string('authorities_picture',96);
            $table->text('authorities_cv');
            $table->tinyInteger('authorities_city_id')->default(0);
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
        Schema::dropIfExists('authorities');
    }
}
