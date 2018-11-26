<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSuratIjinUsahaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('surat_ijin_usaha', function(Blueprint $table)
		{
			$table->foreign('created_by', 'surat_ijin_usaha_created_by_fk')->references('id')->on('cms_users')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('updated_by', 'surat_ijin_usaha_updated_by_fk')->references('id')->on('cms_users')->onUpdate('CASCADE')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('surat_ijin_usaha', function(Blueprint $table)
		{
			$table->dropForeign('surat_ijin_usaha_created_by_fk');
			$table->dropForeign('surat_ijin_usaha_updated_by_fk');
		});
	}

}
