<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPageTable extends Migration
{
    public function up()
    {
        Schema::create('category_page', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('page_id');

            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('page_id')->references('id')->on('page');
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('category_page');
    }
}
