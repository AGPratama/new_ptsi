<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColoumnsToUraianTugas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daftar_uraian_tugas', function (Blueprint $table) {
            $table->integer('kategori_id')->unsigned()->nullable();
            $table->integer('sub_bidang_id')->unsigned()->nullable();
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
            $table->dropColumn('kategori_id');
            $table->dropColumn('sub_bidang_id');
        });
    }
}
