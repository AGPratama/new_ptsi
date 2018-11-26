<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePelangganTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pelanggan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama_pengguna_jasa', 50)->nullable();
			$table->integer('kategori_pengguna_jasa_id')->unsigned()->nullable()->index('fki_pelanggan_kategori_pengguna_jasa_id_fk');
			$table->string('divisi', 50)->nullable();
			$table->string('email', 50)->nullable();
			$table->string('no_telp', 20)->nullable();
			$table->string('contact_person', 30)->nullable();
			$table->string('no_telp_cp', 20)->nullable();
			$table->string('alamat', 150)->nullable();
			$table->string('negara', 30)->nullable();
			$table->string('kecamatan', 30)->nullable();
			$table->string('kelurahan', 30)->nullable();
			$table->integer('kode_pos')->unsigned()->nullable();
			$table->integer('created_by')->unsigned()->nullable()->index('fki_pelanggan_created_by_fk');
			$table->timestamps();
			$table->integer('updated_by')->unsigned()->nullable()->index('fki_pelanggan_updated_by_fk');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pelanggan');
	}

}
