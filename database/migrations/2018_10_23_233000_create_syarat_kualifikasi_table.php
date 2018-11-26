<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSyaratKualifikasiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('syarat_kualifikasi', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama_tender', 100)->nullable();
			$table->string('pemberi_tender', 100)->nullable();
			$table->date('jadwal_tender')->nullable();
			$table->string('status_dokument', 30)->nullable();
			$table->string('status_kelengkapan', 30)->nullable();
			$table->date('tanggal_terkirim')->nullable();
			$table->string('progress', 50)->nullable();
			$table->integer('created_by')->unsigned()->nullable()->index('fki_syarat_kualifikasi_created_by_fk');
			$table->timestamps();
			$table->integer('updated_by')->unsigned()->nullable()->index('fki_syarat_kualifikasi_updated_by_fk');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('syarat_kualifikasi');
	}

}
