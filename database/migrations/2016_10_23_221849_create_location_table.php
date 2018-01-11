<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('coordinate');
            $table->text('name');
            $table->text('description');
            $table->text('address');
            $table->integer('user_id')->unsigned();
        });

        Schema::table('location', function (Blueprint $table) {
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
        Schema::table('location', function (Blueprint $table) {
            $table->dropForeign('location_user_id_foreign');
        });
        Schema::drop('location');
    }
}
