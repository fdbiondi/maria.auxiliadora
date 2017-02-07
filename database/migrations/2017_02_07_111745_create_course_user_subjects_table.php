<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseUserSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_user_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('final_grade');
            //todo can have a state field (libre cursando aprobada reprobada recupera)
            $table->unsignedInteger('subject_id');
            $table->unsignedInteger('course_user_id');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('course_user_id')->references('id')->on('course_users');
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
        Schema::dropIfExists('course_user_subjects');
    }
}
