<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Home extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); 
            
            $table->unsignedBigInteger('user1_id')->nullable();
            $table->foreign('user1_id')->references('id')->on('users');

            $table->unsignedBigInteger('user2_id')->nullable();
            $table->foreign('user2_id')->references('id')->on('users');

            $table->string('token_home');

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
