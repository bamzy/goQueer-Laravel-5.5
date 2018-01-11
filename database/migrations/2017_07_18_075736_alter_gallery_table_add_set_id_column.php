<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterGalleryTableAddSetIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('gallery', function($table) {
            $table->integer('set_id')->unsigned()->nullable();
        });

        Schema::table('gallery', function($table) {
            $table->foreign('set_id')->references('id')->on('sets');
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
