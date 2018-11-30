<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteWaktuPelaksanaanFromUraianTugas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daftar_uraian_tugas', function (Blueprint $table) {
            $table->dropColumn('waktu_pelaksanaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daftar_uraian_tugas', function (Blueprint $table) {
            $table->date('waktu_pelaksanaan')->nullable();
        });
    }
}
