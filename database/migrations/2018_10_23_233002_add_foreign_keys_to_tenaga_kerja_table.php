<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTenagaKerjaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tenaga_kerja', function(Blueprint $table)
		{
			$table->foreign('created_by', 'tenaga_kerja_created_by_fk')->references('id')->on('cms_users')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('strata_id', 'tenaga_kerja_strata_id_fk')->references('id')->on('enumeration')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('teknik_id', 'tenaga_kerja_teknik_id_fk')->references('id')->on('enumeration')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('updated_by', 'tenaga_kerja_updated_by_fk')->references('id')->on('cms_users')->onUpdate('CASCADE')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tenaga_kerja', function(Blueprint $table)
		{
			$table->dropForeign('tenaga_kerja_created_by_fk');
			$table->dropForeign('tenaga_kerja_strata_id_fk');
			$table->dropForeign('tenaga_kerja_teknik_id_fk');
			$table->dropForeign('tenaga_kerja_updated_by_fk');
		});
	}

}
