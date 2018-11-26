<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPengalamanPerusahaanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pengalaman_perusahaan', function(Blueprint $table)
		{
			$table->foreign('created_by', 'pengalaman_perusahaan_created_by_fk')->references('id')->on('cms_users')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('kategori_id', 'pengalaman_perusahaan_kategori_id_fk')->references('id')->on('enumeration')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('updated_by', 'pengalaman_perusahaan_updated_by_fk')->references('id')->on('cms_users')->onUpdate('CASCADE')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pengalaman_perusahaan', function(Blueprint $table)
		{
			$table->dropForeign('pengalaman_perusahaan_created_by_fk');
			$table->dropForeign('pengalaman_perusahaan_kategori_id_fk');
			$table->dropForeign('pengalaman_perusahaan_updated_by_fk');
		});
	}

}
