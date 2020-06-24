<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReponcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reponces', function (Blueprint $table) {
            $table->id();
            $table->text('answare');
            $table->integer('status')->default(0);
            /* Note for Status :
                0 : Initial state make solution by Student
                1 : See for the Teacher and answer
                3 : See teacher response by Student 
            */
            $table->text('notice')->nullable();
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
        Schema::dropIfExists('reponces');
    }
}
