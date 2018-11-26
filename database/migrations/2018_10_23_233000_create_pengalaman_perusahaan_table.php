<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePengalamanPerusahaanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pengalaman_perusahaan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama_paket_perusahaan', 100)->nullable();
			$table->string('bidang', 50)->nullable();
			$table->string('lokasi_proyek', 100)->nullable();
			$table->string('nama_pengguna_jasa', 100)->nullable();
			$table->integer('kategori_id')->unsigned()->nullable()->index('fki_pengalaman_perusahaan_kategori_id_fk');
			$table->string('alamat_pengguna_jasa', 150)->nullable();
			$table->string('no_telp_pengguna_jasa', 20)->nullable();
			$table->date('periode_kerja_dari')->nullable();
			$table->date('periode_kerja_sampai')->nullable();
			$table->string('no_kontrak', 50)->nullable();
			$table->integer('nilai_kontrak')->unsigned()->nullable();
			$table->date('tanggal_selesai_kontrak')->nullable();
			$table->date('tanggal_bast')->nullable();
			$table->string('tahun', 10)->nullable();
			$table->string('no_bast')->nullable();
			$table->integer('created_by')->unsigned()->nullable()->index('fki_pengalaman_perusahaan_created_by_fk');
			$table->timestamps();
			$table->integer('updated_by')->unsigned()->nullable()->index('fki_pengalaman_perusahaan_updated_by_fk');
			$table->string('file_bast')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pengalaman_perusahaan');
	}

}
