<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFkOnFileTable extends Migration
{

    public function up()
    {
        Schema::table('file', function (Blueprint $table) {

        $table->dropForeign('file_user_id_foreign');
        $table->dropColumn('user_id');

        $table->unsignedBigInteger('page_id');
        $table->foreign('page_id')->references('id')->on('page');
        });
    }


    public function down()
    {
        Schema::table('file', function (Blueprint $table) {
            //
        });
    }
}
