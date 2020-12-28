<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->char('firstname', 255);
            $table->char('lastname', 255);
            $table->char('cmnd', 12)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('address_id')->unsigned();
            $table->char('phone_number', 11);
            $table->rememberToken();
            $table->timestamps();
            $table->tinyInteger('status')->nullable();
            $table->integer('role_id')->unsigned();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');;
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
