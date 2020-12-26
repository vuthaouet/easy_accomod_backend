<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boardings', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('price');
            $table->float('area', 8, 2);
            $table->integer('type_id')->unsigned();
            $table->integer('address_id')->unsigned();
            $table->json('images');
            $table->string('description');
            $table->tinyInteger('is_owner');
            $table->integer('electricity_water');
            $table->bigInteger('electricity_price')->nullable();
            $table->bigInteger('water_price')->nullable();
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('type_id')->references('id')->on('type_boardings');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boardings');
    }
}
