<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatementsEthicsTitle extends Migration
{
    /*
        statements_ethics_title table belongs to 2 kinds of data
        1.statements
        2.ethics
        in titels

        atntion : this table has one to many relation with statements_ethics_lists table
        table example :
        ie:
            id      set_kind        set_title
            1       statements      statements 1 explanation
            2       statements      statements 2 explanation
            3       ethics          ethics 1 explanation
            4       ethics          ethics 2 explanation
            ...
    */
    public function up()
    {
        Schema::create('statements_ethics_title', function (Blueprint $table) {
            $table->increments('id');
            $table->string('set_kind',10);
            $table->text('set_title');
            $table->timestamps();
        });
    }

 


    public function down()
    {
        Schema::dropIfExists('statements_ethics_title');
    }
}
