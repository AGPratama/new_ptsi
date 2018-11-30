<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToTenagaKerjaUraian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tenaga_kerja_uraian', function (Blueprint $table) {
            $table->foreign('uraian_id', 'tenaga_kerja_uraian_uraian_id_fk')->references('id')->on('daftar_uraian_tugas')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('tenaga_kerja_id', 'tenaga_kerja_uraian_id_fk')->references('id')->on('tenaga_kerja')->onUpdate('CASCADE')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tenaga_kerja_uraian', function (Blueprint $table) {
            $table->dropForeign('tenaga_kerja_uraian_uraian_id_fk');
			$table->dropForeign('tenaga_kerja_uraian_id_fk');
        });
    }
}
