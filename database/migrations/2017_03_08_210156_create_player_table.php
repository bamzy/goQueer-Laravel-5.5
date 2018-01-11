<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->char('device_id',120);
            $table->integer('user_id')->nullable()->unsigned();

        });

        Schema::table('player', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('user')
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
        Schema::table('player', function (Blueprint $table) {
            $table->dropForeign('player_user_id_foreign');
        });
        Schema::drop('player');
    }
}
