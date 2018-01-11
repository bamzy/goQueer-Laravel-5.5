<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hint', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('content');
            $table->integer('location_id')->unsigned();

        });

        Schema::table('hint', function (Blueprint $table) {
            $table->foreign('location_id')->references('id')->on('location');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hint', function (Blueprint $table) {
            $table->dropForeign('hint_location_id_foreign');
        });
        Schema::drop('hint');
    }
}
