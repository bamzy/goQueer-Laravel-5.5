<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
  public function up()
  {
		Schema::table('user', function(Blueprint $table) {
			$table->foreign('role_id')
						->references('id')
						->on('roles')
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
		Schema::table('user', function(Blueprint $table) {
			$table->dropForeign('user_role_id_foreign');
		});
	}

}
