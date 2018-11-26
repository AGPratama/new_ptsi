<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSyaratKualifikasiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('syarat_kualifikasi', function(Blueprint $table)
		{
			$table->foreign('created_by', 'syarat_kualifikasi_created_by_fk')->references('id')->on('cms_users')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('updated_by', 'syarat_kualifikasi_updated_by_fk')->references('id')->on('cms_users')->onUpdate('CASCADE')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('syarat_kualifikasi', function(Blueprint $table)
		{
			$table->dropForeign('syarat_kualifikasi_created_by_fk');
			$table->dropForeign('syarat_kualifikasi_updated_by_fk');
		});
	}

}
