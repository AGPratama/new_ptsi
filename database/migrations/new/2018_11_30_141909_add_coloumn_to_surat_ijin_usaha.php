<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColoumnToSuratIjinUsaha extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat_ijin_usaha', function (Blueprint $table) {
            $table->string('surat_ijin', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surat_ijin_usaha', function (Blueprint $table) {
            $table->dropColumn('surat_ijin');
        });
    }
}
