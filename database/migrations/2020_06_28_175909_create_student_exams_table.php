<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_exams', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('exercise_id');
            $table->unsignedBigInteger('reponce_id');
            $table->integer('note')->default(0);
            $table->timestamps();
            $table->foreign('student_id')->references('user_id')->on('students');
            $table->foreign('exercise_id')->references('practice_id')->on('exercises');
            $table->foreign('reponce_id')->references('id')->on('reponces');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_exams');
    }
}
