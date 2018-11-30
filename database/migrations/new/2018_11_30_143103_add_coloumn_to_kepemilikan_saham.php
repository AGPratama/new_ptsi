<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColoumnToKepemilikanSaham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kepemilikan_saham', function (Blueprint $table) {
            $table->string('ktp', 255)->nullable();
            $table->string('npwp', 255)->nullable();
            $table->string('bukti_pajak', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kepemilikan_saham', function (Blueprint $table) {
            $table->dropColumn('ktp');
            $table->dropColumn('npwp');
            $table->dropColumn('bukti_pajak');
        });
    }
}
