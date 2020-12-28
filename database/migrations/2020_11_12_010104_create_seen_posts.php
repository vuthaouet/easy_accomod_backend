<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeenPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seen_posts', function (Blueprint $table) {
            $table->integer('post_id')->unsigned();
            $table->bigInteger('count');
            $table->dateTime('time_seen');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seen_posts');
    }
}
