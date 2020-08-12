<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRememberTokenOnTableUser extends Migration
{


    public function up()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->string('remember_token')->nullable();
        });
    }




    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn('remember_token');
        });
    }
}
