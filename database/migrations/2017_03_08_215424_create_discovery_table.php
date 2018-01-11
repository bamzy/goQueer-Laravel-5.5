<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscoveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discovery', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('location_id')->unsigned();
            $table->integer('player_id')->unsigned();
        });
        Schema::table('discovery', function (Blueprint $table) {
            $table->foreign('location_id')->references('id')->on('location')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('player_id')->references('id')->on('player')
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
        Schema::table('discovery', function (Blueprint $table) {
            $table->dropForeign('discovery_location_id_foreign');
        });
        Schema::table('discovery', function (Blueprint $table) {
            $table->dropForeign('discovery_player_id_foreign');
        });
        Schema::drop('discovery');

    }
}
