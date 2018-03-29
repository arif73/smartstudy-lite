<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmartstudyVideoreactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smartstudy_videoreactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('video_id');
            $table->integer('user_id');
            $table->time('time');
            $table->float('ip');
            $table->tinyInteger('reaction_type_id');
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
        Schema::dropIfExists('smartstudy_videoreactions');
    }
}
