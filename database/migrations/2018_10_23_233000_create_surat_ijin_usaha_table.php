<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuratIjinUsahaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('surat_ijin_usaha', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('ijin_usaha', 100)->nullable();
			$table->string('no_ijin_usaha', 50)->nullable();
			$table->date('tanggal_terbit')->nullable();
			$table->date('berlaku_sampai')->nullable();
			$table->string('instansi_pemberi', 50)->nullable();
			$table->string('jenis_ijin_usaha', 50)->nullable();
			$table->string('kualifikasi', 50)->nullable();
			$table->string('keterangan', 150)->nullable();
			$table->integer('created_by')->unsigned()->nullable()->index('fki_surat_ijin_usaha_created_by_fk');
			$table->timestamps();
			$table->integer('updated_by')->unsigned()->nullable()->index('fki_surat_ijin_usaha_updated_by_fk');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('surat_ijin_usaha');
	}

}
