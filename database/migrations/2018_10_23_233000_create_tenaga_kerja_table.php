<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTenagaKerjaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tenaga_kerja', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama', 50)->nullable();
			$table->string('jabatan', 50)->nullable();
			$table->string('tempat_lahir', 50)->nullable();
			$table->date('tanggal_lahir')->nullable();
			$table->integer('no_ktp')->nullable();
			$table->string('no_npwp', 30)->nullable();
			$table->string('pendidikan_formal', 50)->nullable();
			$table->string('lama_pengalaman_kerja', 50)->nullable();
			$table->string('tahun_ijazah', 10)->nullable();
			$table->integer('teknik_id')->unsigned()->nullable()->index('fki_tenaga_kerja_teknik_id_fk');
			$table->integer('strata_id')->unsigned()->nullable()->index('fki_tenaga_kerja_strata_id_fk');
			$table->string('jurusan', 50)->nullable();
			$table->string('institusi', 50)->nullable();
			$table->string('pendidikan_non_formal', 50)->nullable();
			$table->string('status_kepegawaian', 50)->nullable();
			$table->string('sertifikat_training', 50)->nullable();
			$table->string('no_sertifikat', 50)->nullable();
			$table->integer('created_by')->unsigned()->nullable()->index('fki_tenaga_kerja_created_by_fk');
			$table->timestamps();
			$table->integer('updated_by')->unsigned()->nullable()->index('fki_tenaga_kerja_updated_by_fk');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tenaga_kerja');
	}

}
