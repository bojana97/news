<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOnDeleteCascadeOnTableComment extends Migration
{

    public function up()
    {
        Schema::table('comment', function (Blueprint $table) {

            $table->dropForeign('comment_page_id_foreign');
            $table->foreign('page_id')
            ->references('id')->on('page')
            ->onDelete('cascade');

            $table->dropForeign('comment_user_id_foreign');
            $table->foreign('user_id')
            ->references('id')->on('user')
            ->onDelete('cascade');

        });
    }


    public function down()
    {
        Schema::table('comment', function (Blueprint $table) {

            $table->dropForeign('comment_page_id_foreign');
            $table->foreign('page_id')
            ->references('id')->on('page');

            $table->dropForeign('comment_user_id_foreign');
            $table->foreign('user_id')
            ->references('id')->on('user');

        });
        
    }
}
