<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropAllForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::table('discovery', function(Blueprint $table){
            $table->dropForeign('discovery_location_id_foreign');
            $table->dropForeign('discovery_player_id_foreign');
        });

        Schema::table('hint', function(Blueprint $table){
            $table->dropForeign('hint_location_id_foreign');
        });

        Schema::table('message', function(Blueprint $table){
            $table->dropForeign('message_media_id_foreign');
        });

        Schema::table('gallery_media', function(Blueprint $table){
            $table->dropForeign('gallery_media_media_id_foreign');
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
