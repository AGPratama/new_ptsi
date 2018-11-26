<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPeralatanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('peralatan', function(Blueprint $table)
		{
			$table->foreign('created_by', 'peralatan_created_by_fk')->references('id')->on('cms_users')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('kondisi_id', 'peralatan_kondisi_id_fk')->references('id')->on('enumeration')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('updated_by', 'peralatan_updated_by_fk')->references('id')->on('cms_users')->onUpdate('CASCADE')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('peralatan', function(Blueprint $table)
		{
			$table->dropForeign('peralatan_created_by_fk');
			$table->dropForeign('peralatan_kondisi_id_fk');
			$table->dropForeign('peralatan_updated_by_fk');
		});
	}

}
