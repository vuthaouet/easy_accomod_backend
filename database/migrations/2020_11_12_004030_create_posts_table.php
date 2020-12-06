<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('boarding_id')->unsigned();
            $table->string('title');
            $table->integer('user_id')->unsigned();
            $table->dateTime('time_display', 0);
            $table->tinyInteger('status_review')->default(0);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('boarding_id')->references('id')->on('boardings');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
