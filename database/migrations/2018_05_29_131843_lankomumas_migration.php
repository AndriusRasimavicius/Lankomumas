<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LankomumasMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
           $table->increments('id');
           $table->date('year');
           $table->integer('quarter');
           $table->string('name', 64);
           $table->string('address', 256);
           $table->string('type', 64);
           $table->integer('user_id')->unsigned()->index();
           $table->integer('deleted')->default('0');
           $table->rememberToken();
           $table->timestamps();
           $table->foreign('user_id')->references('id')->on('users');
           });

           Schema::create('students', function (Blueprint $table) {
           $table->increments('id');
           $table->string('name', 64);
           $table->string('surname', 64);
           $table->string('class', 64);
           $table->string('school', 64);
           $table->rememberToken();
           $table->timestamps();
           });

           Schema::create('lessons', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('club_id')->unsigned()->index();
           $table->date('date');
           $table->rememberToken();
           $table->timestamps();
           $table->foreign('club_id')->references('id')->on('clubs');
           });

           
           Schema::create('registrations', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('student_id')->unsigned()->index();
           $table->integer('club_id')->unsigned()->index();
           $table->rememberToken();
           $table->timestamps();

           $table->foreign('student_id')->references('id')->on('students');
           $table->foreign('club_id')->references('id')->on('clubs');
           });

           Schema::create('attendance', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('lesson_id')->unsigned()->index();
           $table->integer('student_id')->unsigned()->index();
           $table->integer('attended');
           $table->rememberToken();
           $table->timestamps();
           $table->foreign('lesson_id')->references('id')->on('lessons');
           $table->foreign('student_id')->references('id')->on('students');
           });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clubs');
        Schema::dropIfExists('students');
        Schema::dropIfExists('lessons');
        Schema::dropIfExists('registrations');
        Schema::dropIfExists('attendence');
      
    }
}
