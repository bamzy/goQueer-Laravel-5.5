<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gallery_id')->unsigned();
            $table->integer('order')->unsigned();
            $table->integer('media_id')->unsigned();
        });

        Schema::table('gallery_media', function (Blueprint $table) {
            $table->foreign('gallery_id')->references('id')->on('gallery')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('media_id')->references('id')->on('media')
                ->onDelete('restrict')
                ->onUpdate('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gallery_media', function (Blueprint $table) {
            $table->dropForeign('gallery_media_gallery_id_foreign');
        });
        Schema::table('gallery_media', function (Blueprint $table) {
            $table->dropForeign('gallery_media_media_id_foreign');
        });

        Schema::drop('gallery_media');
    }
}
