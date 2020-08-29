<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOnDeleteCascadeOnTableFile extends Migration
{

    public function up()
    {
        Schema::table('file', function (Blueprint $table) {

            $table->dropForeign('file_page_id_foreign');
            $table->foreign('page_id')
            ->references('id')->on('page')
            ->onDelete('cascade');

        });
    }



    public function down()
    {
        Schema::table('file', function (Blueprint $table) {

            $table->dropForeign('file_page_id_foreign');
            $table->foreign('page_id')
            ->references('id')->on('page');
        
        });
    }
}
