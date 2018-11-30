<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToTenagaKerjaPengalaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tenaga_kerja_pengalaman', function (Blueprint $table) {
            $table->foreign('pengalaman_id', 'tenaga_kerja_pengalaman_fk')->references('id')->on('pengalaman_uraian_kerja')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('tenaga_kerja_id', 'tenaga_kerja_pengalaman_id_fk')->references('id')->on('tenaga_kerja')->onUpdate('CASCADE')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tenaga_kerja_pengalaman', function (Blueprint $table) {
            $table->dropForeign('tenaga_kerja_pengalaman_fk');
			$table->dropForeign('tenaga_kerja_pengalaman_id_fk');
        });
    }
}
