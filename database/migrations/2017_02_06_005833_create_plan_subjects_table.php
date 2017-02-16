<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_subject', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('plan_id');
            $table->unsignedInteger('subject_id');
            
            $table->foreign('plan_id')->references('id')->on('plans');
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
        Schema::dropIfExists('plan_subject');
    }
}
