<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryPurposePlan extends Migration
{
    /*
        history_purpose_plan table belongs to 3 kinds of data:
        1.history
        2.purpose
        3.plan
        table example :
        ie:
            id      hpp_kind        hpp_data
            1       history         the history explanation
            2       purpose         purpose 1 explanation
            3       purpose         purpose 2 explanation
            4       plan            plane 1 explanation
            5       plan            plane 2 explanation
            ...
    */
    public function up()
    {
        Schema::create('history_purpose_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hpp_kind',10);
            $table->text('hpp_data');
            $table->timestamps();
        });
    }




    public function down()
    {
        Schema::dropIfExists('history_purpose_plan');
    }
}
