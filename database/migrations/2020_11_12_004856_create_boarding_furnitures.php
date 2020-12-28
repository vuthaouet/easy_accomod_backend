<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardingFurnitures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boarding_furnitures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('furniture_id')->unsigned();
            $table->integer('boarding_id')->unsigned();
            $table->foreign('furniture_id')->references('id')->on('furnitures')->onDelete('cascade');;
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
        //
    }
}
