<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeralatanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('peralatan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama', 100)->nullable();
			$table->string('merek', 100)->nullable();
			$table->string('tahun_pembuatan', 4)->nullable();
			$table->integer('jumlah')->unsigned()->nullable();
			$table->integer('kapasitas')->unsigned()->nullable();
			$table->integer('kondisi_id')->unsigned()->nullable()->index('fki_peralatan_kondisi_id_fk');
			$table->string('lokasi', 150)->nullable();
			$table->string('bukti', 400)->nullable();
			$table->integer('created_by')->unsigned()->nullable()->index('fki_peralatan_created_by_fk');
			$table->timestamps();
			$table->integer('updated_by')->unsigned()->nullable()->index('fki_peralatan_updated_by_fk');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('peralatan');
	}

}
