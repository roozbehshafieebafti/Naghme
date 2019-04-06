<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatementsEthicsLists extends Migration
{
    /*
        statements_ethics_lists table belongs to 2 kinds of data
        1.statements
        2.ethics
        in list descriptin

        atntion : this table has one to many relation with statements_ethics_title table
        table example :
        ie:
            id      sel_title_id        sel_description
            1       4                   statements list explanation
            2       3                   statements list explanation
            3       4                   ethics list explanation
            4       1                   ethics list explanation
            ...
    */
    public function up()
    {
        Schema::create('statements_ethics_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sel_title_id');
            $table->text('sel_description');
            $table->timestamps();
        });
    }

    

    public function down()
    {
        Schema::dropIfExists('statements_ethics_lists');
    }
}
