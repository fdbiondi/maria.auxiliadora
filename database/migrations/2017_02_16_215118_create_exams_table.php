<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mark'); //TODO ver si la nota la guardamos aca o en la tabla de notas
            $table->boolean('attended')->default(false);
            $table->unsignedInteger('exam_act_id');
            $table->unsignedInteger('subject_registration_id');

            $table->foreign('exam_act_id')->references('id')->on('exam_acts');
            $table->foreign('subject_registration_id')->references('id')->on('subjects_registration');

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
        Schema::dropIfExists('exams');
    }
}
