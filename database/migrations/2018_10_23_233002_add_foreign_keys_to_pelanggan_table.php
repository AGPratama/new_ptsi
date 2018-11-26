<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPelangganTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pelanggan', function(Blueprint $table)
		{
			$table->foreign('created_by', 'pelanggan_created_by_fk')->references('id')->on('cms_users')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('kategori_pengguna_jasa_id', 'pelanggan_kategori_pengguna_jasa_id_fk')->references('id')->on('enumeration')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('updated_by', 'pelanggan_updated_by_fk')->references('id')->on('cms_users')->onUpdate('CASCADE')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pelanggan', function(Blueprint $table)
		{
			$table->dropForeign('pelanggan_created_by_fk');
			$table->dropForeign('pelanggan_kategori_pengguna_jasa_id_fk');
			$table->dropForeign('pelanggan_updated_by_fk');
		});
	}

}
