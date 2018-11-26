<?php

use Illuminate\Database\Seeder;

class PeralatanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('peralatan')->delete();
        
        \DB::table('peralatan')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Kulkas',
                'merek' => 'Sanyo',
                'tahun_pembuatan' => '2018',
                'jumlah' => 2,
                'kapasitas' => 12,
                'kondisi_id' => 17,
                'lokasi' => 'Living room',
                'bukti' => 'uploads/1/2018-10/dashboard.png',
                'created_by' => 1,
                'created_at' => '2018-10-19 22:34:46',
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
        ));
        
        
    }
}