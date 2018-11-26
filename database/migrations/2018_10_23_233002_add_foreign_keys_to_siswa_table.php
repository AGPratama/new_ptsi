<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSiswaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('siswa', function(Blueprint $table)
		{
			$table->foreign('user_id', 'siswa_user_id')->references('id')->on('cms_users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('siswa', function(Blueprint $table)
		{
			$table->dropForeign('siswa_user_id');
		});
	}

}
