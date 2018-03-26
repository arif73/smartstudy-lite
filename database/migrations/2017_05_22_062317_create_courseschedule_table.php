<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursescheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courseschedule', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('periods_id');
            $table->integer('rooms_id');
            $table->integer('days_id');
            $table->integer('teachers_id');
            $table->integer('courses_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courseschedule');
    }
}
