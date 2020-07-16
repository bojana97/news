<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username', 50);
            $table->string('email', 50)->unique();
            $table->string('password', 255);
            $table->enum('type', ['admin', 'author', 'public']);	
            $table->timestamp('created_at', 0);
        });
    }



    public function down()
    {
        Schema::dropIfExists('user');
    }
}
