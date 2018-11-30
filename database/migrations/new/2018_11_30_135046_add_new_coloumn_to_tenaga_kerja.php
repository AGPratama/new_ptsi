<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColoumnToTenagaKerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tenaga_kerja', function (Blueprint $table) {
            $table->text('alamat')->nullable();
            $table->string('ktp', 255)->nullable();
            $table->string('npwp', 255)->nullable();
            $table->string('bukti_pajak', 255)->nullable();
            $table->string('bukti_ijasah', 255)->nullable();
            $table->text('sertifikat')->nullable();
            $table->string('tkdn_ptsi', 255)->nullable();
            $table->string('no_sertifikat_tkdn_migas', 255)->nullable();
            $table->date('tgl_sertifikat_tkdn_migas')->nullable();
            $table->date('masa_berlaku_tkdn_migas')->nullable();
            $table->string('ska', 255)->nullable();
            $table->string('no_ska', 255)->nullable();
            $table->date('tgl_ska')->nullable();
            $table->date('masa_berlaku_ska')->nullable();
            $table->string('asosiasi', 255)->nullable();
            $table->string('referensi', 255)->nullable();
            $table->string('no_ktp', 16)->nullable()->change();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tenaga_kerja', function (Blueprint $table) {
            $table->dropColumn('alamat');
            $table->dropColumn('ktp');
            $table->dropColumn('npwp');
            $table->dropColumn('bukti_pajak');
            $table->dropColumn('bukti_ijasah');
            $table->dropColumn('sertifikat');
            $table->dropColumn('tkdn_ptsi');
            $table->dropColumn('no_sertifikat_tkdn_migas');
            $table->dropColumn('tgl_sertifikat_tkdn_migas');
            $table->dropColumn('masa_berlaku_tkdn_migas');
            $table->dropColumn('ska');
            $table->dropColumn('no_ska');
            $table->dropColumn('tgl_ska');
            $table->dropColumn('masa_berlaku_ska');
            $table->dropColumn('asosiasi');
            $table->dropColumn('referensi');
            $table->integer('no_ktp')->nullable()->change();
        });
    }
}
