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
            id      hpp_kind        hpp_city_id         hpp_data
            1       history         1                   the history explanation
            2       purpose         1                   purpose 1 explanation
            3       purpose         1                   purpose 2 explanation
            4       plan            1                   plane 1 explanation
            5       plan            1                   plane 2 explanation
            ...
    */
    public function up()
    {
        Schema::create('history_purpose_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('hpp_city_id')->default(1);
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
