<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeworksubmissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homeworksubmissions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('text')->nullable();
            $table->string('filepath')->nullable();
            $table->string('status')->nullable();
            $table->string('comment')->nullable();
            $table->integer('homeworks_id');
            $table->integer('students_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homeworksubmissions');
    }
}
