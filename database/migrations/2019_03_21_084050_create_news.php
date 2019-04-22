<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNews extends Migration
{
    /**
        News table
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('news_title',64);
            $table->string('news_picture',96);
            $table->string('news_file',96)->nullable();
            $table->text('news_description');
            $table->string('news_link_name',32)->nullable();
            $table->string('news_link')->nullable();
            $table->string('news_link_name2',32)->nullable();
            $table->string('news_link2')->nullable();
            $table->string('news_link_name3',32)->nullable();
            $table->string('news_link3')->nullable();
            $table->integer('news_date',10);
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
        Schema::dropIfExists('news');
    }
}
