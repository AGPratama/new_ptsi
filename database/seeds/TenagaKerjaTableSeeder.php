<?php

use Illuminate\Database\Seeder;

class TenagaKerjaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tenaga_kerja')->delete();
        
        \DB::table('tenaga_kerja')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Dudi Iskandar',
                'jabatan' => 'Directur',
                'tempat_lahir' => 'Bogor',
                'tanggal_lahir' => '2000-12-15',
                'no_ktp' => 1231220,
                'no_npwp' => '1233333333123123123',
                'pendidikan_formal' => 'S1',
                'lama_pengalaman_kerja' => '4',
                'tahun_ijazah' => '2018',
                'teknik_id' => 6,
                'strata_id' => 12,
                'jurusan' => 'RPL',
                'institusi' => 'IPB',
                'pendidikan_non_formal' => 'qwe',
                'status_kepegawaian' => 'qwe',
                'sertifikat_training' => 'qwe',
                'no_sertifikat' => '12312',
                'created_by' => 1,
                'created_at' => '2018-10-19 09:49:23',
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
        ));
        
        
    }
}