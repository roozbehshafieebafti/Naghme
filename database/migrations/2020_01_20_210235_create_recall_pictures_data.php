<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecallPicturesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reacll_pictures_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('recall_id');
            $table->string('title',100);
            $table->string('production_date',10);
            $table->string('size',100);
            $table->string('technique',100);
            $table->string('statements',100);
            $table->string('picture',255);
            $table->tinyInteger('is_deleted');
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
        Schema::dropIfExists('reacll_pictures_data');
    }
}
