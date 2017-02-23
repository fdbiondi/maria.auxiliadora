<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseUserSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_user_subject', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mark');
            //todo can have a state field (libre cursando aprobada reprobada recupera)
            $table->unsignedInteger('subject_id');
            $table->unsignedInteger('course_user_id');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('course_user_id')->references('id')->on('course_user');
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
        Schema::dropIfExists('course_user_subject');
    }
}
