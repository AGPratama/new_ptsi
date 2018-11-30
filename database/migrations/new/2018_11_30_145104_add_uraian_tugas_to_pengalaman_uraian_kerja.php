<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUraianTugasToPengalamanUraianKerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengalaman_uraian_kerja', function (Blueprint $table) {
            $table->text('uraian_tugas')->nullable();
            $table->date('waktu_pelaksanaan_end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengalaman_uraian_kerja', function (Blueprint $table) {
            $table->dropColumn('uraian_tugas');
            $table->dropColumn('waktu_pelaksanaan_end');
        });
    }
}
