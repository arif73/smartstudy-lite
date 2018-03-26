<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseClasse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courseclasses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('courses_id');
            $table->integer('classes_id');
            $table->integer('sections_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courseclasses');
    }
}
