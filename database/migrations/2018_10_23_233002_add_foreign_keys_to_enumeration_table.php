<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEnumerationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('enumeration', function(Blueprint $table)
		{
			$table->foreign('created_by', 'enumeration_created_by_fk')->references('id')->on('cms_users')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('updated_by', 'enumeration_updated_by_fk')->references('id')->on('cms_users')->onUpdate('CASCADE')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('enumeration', function(Blueprint $table)
		{
			$table->dropForeign('enumeration_created_by_fk');
			$table->dropForeign('enumeration_updated_by_fk');
		});
	}

}
