<?php

use Illuminate\Database\Seeder;

class SuratIjinUsahaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('surat_ijin_usaha')->delete();
        
        \DB::table('surat_ijin_usaha')->insert(array (
            0 => 
            array (
                'id' => 1,
                'ijin_usaha' => 'Dagang',
                'no_ijin_usaha' => '20112312',
                'tanggal_terbit' => '2018-10-25',
                'berlaku_sampai' => '2018-12-08',
                'instansi_pemberi' => 'Instusi',
                'jenis_ijin_usaha' => 'Dagang',
                'kualifikasi' => 'Lulus',
                'keterangan' => 'Hello World',
                'created_by' => 1,
                'created_at' => '2018-10-19 22:46:50',
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
        ));
        
        
    }
}