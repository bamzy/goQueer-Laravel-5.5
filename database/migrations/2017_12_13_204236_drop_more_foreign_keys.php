<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropMoreForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {




        Schema::table('location', function(Blueprint $table){
            $table->dropForeign('location_gallery_id_foreign');
        });

        Schema::table('gallery_media', function(Blueprint $table){
            $table->dropForeign('gallery_media_gallery_id_foreign');
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
