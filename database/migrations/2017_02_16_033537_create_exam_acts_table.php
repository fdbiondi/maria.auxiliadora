<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamActsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_acts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('act_number');
            $table->string('classroom'); //todo podria ser una tabla que posea ls salones
            $table->dateTime('date_time');
            $table->unsignedInteger('exam_instance_id');
            $table->unsignedInteger('subject_id');
            
            $table->foreign('exam_instance_id')->references('id')->on('exam_instances');
            $table->foreign('subject_id')->references('id')->on('subjects');
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
        Schema::dropIfExists('exam_acts');
    }
}
