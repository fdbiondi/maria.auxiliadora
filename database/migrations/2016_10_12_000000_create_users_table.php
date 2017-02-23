<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name', 20);
            $table->string('email')->unique();
            $table->string('password');
            
            $table->string('dni', 11)->unique();
            $table->integer('file_number')->unique();
            $table->string('address', 100)->default('');
            $table->string('phone', 25)->default('');
            
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('role_id');
            
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('role_id')->references('id')->on('roles');
            
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
