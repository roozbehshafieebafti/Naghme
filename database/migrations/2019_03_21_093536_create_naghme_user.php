<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNaghmeUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('naghme_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('naghme_user_id_card');
            $table->tinyInteger('naghme_user_city_id')->default(0);
            $table->string('naghme_user_name',32);
            $table->string('naghme_user_family',32);
            $table->string('naghme_user_kind',16);
            $table->tinyInteger('naghme_user_level');
            $table->string('naghme_user_activity',64);
            $table->boolean('naghme_user_status');
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
        Schema::dropIfExists('naghme_user');
    }
}
