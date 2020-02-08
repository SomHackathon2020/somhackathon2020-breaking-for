<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Recordatori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recordatori', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); 
            $table->datetime ('hora'); 

            $table->unsignedBigInteger('home_id')->nullable();
            $table->foreign('home_id')->references('id')->on('home');
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
