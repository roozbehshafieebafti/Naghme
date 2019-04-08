<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForm extends Migration
{
    /**
        form tables
     */
    public function up()
    {
        Schema::create('form', function (Blueprint $table) {
            $table->increments('id');
            $table->string('form_title',128);
            $table->text('form_description');
            $table->string('form_file1');
            $table->string('form_file2')->nullable();
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
        Schema::dropIfExists('form');
    }
}
