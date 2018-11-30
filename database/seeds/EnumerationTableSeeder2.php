<?php

use Illuminate\Database\Seeder;

class EnumerationTableSeeder2 extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('enumeration')->insert(array (
            0 =>
            array (
                'key' => 'SubBidang',
                'value' => 'TKDN',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            1 =>
            array (
                'key' => 'SubBidang',
                'value' => 'Review Design',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            2 =>
            array (
                'key' => 'SubBidang',
                'value' => 'Studi Kelayakan',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            3 =>
            array (
                'key' => 'SubBidang',
                'value' => 'Pengawasan',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            4 =>
            array (
                'key' => 'SubBidang',
                'value' => 'Survey Kepuasan Pelanggan',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            5 =>
            array (
                'key' => 'SubBidang',
                'value' => 'Konsultasi',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            6 =>
            array (
                'key' => 'SubBidang',
                'value' => 'Survey',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            7 =>
            array (
                'key' => 'HasilTender',
                'value' => 'Menang',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            8 =>
            array (
                'key' => 'HasilTender',
                'value' => 'Lelang Ulang',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            9 =>
            array (
                'key' => 'HasilTender',
                'value' => 'Kalah PQ',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            10 =>
            array (
                'key' => 'HasilTender',
                'value' => 'Batal Ikut',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            11 =>
            array (
                'key' => 'HasilTender',
                'value' => 'Kalah Penawaran',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
        ));


    }
}
