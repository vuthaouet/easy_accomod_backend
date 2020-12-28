<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardingPalceAroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boarding_palce_arounds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('palce_around_id')->unsigned();
            $table->integer('boarding_id')->unsigned();
            $table->foreign('palce_around_id')->references('id')->on('place_arounds')->onDelete('cascade');;
            $table->foreign('boarding_id')->references('id')->on('boardings')->onDelete('cascade');;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boarding_palce_arounds');
    }
}
