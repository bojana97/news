<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOnDeleteCascadeOnTableCategoryPage extends Migration
{

    public function up()
    {
        Schema::table('category_page', function (Blueprint $table) {

            $table->dropForeign('category_page_category_id_foreign');
            $table->foreign('category_id')
            ->references('id')->on('category')
            ->onDelete('cascade');

            $table->dropForeign('category_page_page_id_foreign');
            $table->foreign('page_id')
            ->references('id')->on('page')
            ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('category_page', function (Blueprint $table) {

            $table->dropForeign('category_page_category_id_foreign');
            $table->foreign('category_id')
            ->references('id')->on('category');

            $table->dropForeign('category_page_page_id_foreign');
            $table->foreign('page_id')
            ->references('id')->on('page');

        });
    }
}
