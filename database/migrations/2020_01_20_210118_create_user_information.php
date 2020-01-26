<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_information', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('national_code',10);
            $table->string('birth_date',10);
            $table->string('birth_location',110);
            $table->string('phone_number',11);
            $table->string('constant_number',20);
            $table->string('address',100);
            $table->string('major',100);
            $table->string('education_level',20);
            $table->string('univercity',100);
            $table->text('brife_art_expirences');
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
        Schema::dropIfExists('user_information');
    }
}
