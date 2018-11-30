<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPicPerlengkapanToPeralatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('peralatan', function (Blueprint $table) {
            $table->string('pic_peralatan', 400)->nullable();
            $table->integer('kategori_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peralatan', function (Blueprint $table) {
            $table->dropColumn('pic_peralatan');
            $table->dropColumn('kategori_id');
        });
    }
}
