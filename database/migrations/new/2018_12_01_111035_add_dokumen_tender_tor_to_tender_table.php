<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDokumenTenderTorToTenderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tender', function (Blueprint $table) {
            $table->string('dokument_tender_tor')->nullable();
            $table->string('pengumuman_hasil_tender')->nullable();
            $table->integer('sub_bidang')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tender', function (Blueprint $table) {
            $table->dropColumn('dokument_tender_tor');
            $table->dropColumn('pengumuman_hasil_tender');
            $table->dropColumn('tender');
        });
    }
}
