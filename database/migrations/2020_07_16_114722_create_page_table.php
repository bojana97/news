<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageTable extends Migration
{

    public function up()
    {
        Schema::create('page', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('title', 100);
            $table->longText('content');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user');
        });
    }


    public function down()
    {
        Schema::dropIfExists('page');
    }
}
