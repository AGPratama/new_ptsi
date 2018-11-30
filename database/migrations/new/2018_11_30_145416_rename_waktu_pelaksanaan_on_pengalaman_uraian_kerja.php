<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameWaktuPelaksanaanOnPengalamanUraianKerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengalaman_uraian_kerja', function (Blueprint $table) {
            $table->renameColumn('waktu_pelaksanaan', 'waktu_pelaksanaan_start');
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
            $table->renameColumn('waktu_pelaksanaan_start', 'waktu_pelaksanaan');
        });
    }
}
