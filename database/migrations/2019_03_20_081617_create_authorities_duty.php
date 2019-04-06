<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthoritiesDuty extends Migration
{
    /**
        authorities_duty stores personel duties in organization
     */
    public function up()
    {
        Schema::create('authorities_duty', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ad_authorities_title',32);
            $table->text('ad_authorities_duty');
            $table->tinyInteger('ad_authorities_city_id')->default(0);
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
        Schema::dropIfExists('authorities_duty');
    }
}
