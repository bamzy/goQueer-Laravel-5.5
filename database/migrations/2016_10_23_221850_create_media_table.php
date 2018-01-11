<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('media', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('source');
            $table->text('name');
            $table->text('description');
            $table->text('filePath');
            $table->text('fileName');
            $table->date('date');
            $table->integer('copyright_status_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('progress_status_id')->unsigned();
        });

        Schema::table('media', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('user')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('type_id')->references('id')->on('media_type')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('copyright_status_id')->references('id')->on('copyright_status')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('progress_status_id')->references('id')->on('progress_status')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->dropForeign('media_user_id_foreign');
            $table->dropForeign('media_type_id_foreign');
            $table->dropForeign('media_copyright_status_id_foreign');
            $table->dropForeign('media_progress_status_id_foreign');
        });

        Schema::drop('media');
    }
}
