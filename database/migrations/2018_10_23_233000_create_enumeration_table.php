<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnumerationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('enumeration', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('key', 50);
			$table->string('value', 50);
			$table->integer('created_by')->unsigned()->index('fki_enumeration_created_by_fk');
			$table->timestamps();
			$table->integer('updated_by')->unsigned()->nullable()->index('fki_enumeration_updated_by_fk');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('enumeration');
	}

}
