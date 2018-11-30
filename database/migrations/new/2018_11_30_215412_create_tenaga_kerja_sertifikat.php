<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenagaKerjaSertifikat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenaga_kerja_sertifikat', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('tenaga_kerja_id')->nullable();
			$table->string('sertifikat')->nullable();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tenaga_kerja_sertifikat');
    }
}
