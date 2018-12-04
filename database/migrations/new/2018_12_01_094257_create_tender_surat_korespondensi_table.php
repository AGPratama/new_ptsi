<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenderSuratKorespondensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tender_surat_korespondensi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tender_id')->unsigned()->nullable();
            $table->integer('surat_id')->nullable();
            $table->string('surat_korespondensi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tender_surat_korespondensi');
    }
}
