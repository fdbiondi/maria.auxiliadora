<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_inscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('grade'); //TODO ver si la nota la guardamos aca o en la tabla de notas
            $table->unsignedInteger('exam_id');
            $table->unsignedInteger('course_user_subject_id');

            $table->foreign('exam_id')->references('id')->on('exams');
            $table->foreign('course_user_subject_id')->references('id')->on('course_user_subjects');
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
        Schema::dropIfExists('exam_inscriptions');
    }
}
