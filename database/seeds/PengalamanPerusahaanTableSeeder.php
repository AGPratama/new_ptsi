<?php

use Illuminate\Database\Seeder;

class PengalamanPerusahaanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pengalaman_perusahaan')->delete();
        
        \DB::table('pengalaman_perusahaan')->insert(array (
            0 => 
            array (
                'id' => 2,
                'nama_paket_perusahaan' => 'Pengerjaan Project Besar',
                'bidang' => 'Informatika',
                'lokasi_proyek' => 'Bogor',
                'nama_pengguna_jasa' => 'Dudi',
                'kategori_id' => 3,
                'alamat_pengguna_jasa' => 'Long Distance',
                'no_telp_pengguna_jasa' => '085774216703',
                'periode_kerja_dari' => '2018-10-01',
                'periode_kerja_sampai' => '2018-10-25',
                'no_kontrak' => '010818001',
                'nilai_kontrak' => 12000000,
                'tanggal_selesai_kontrak' => '2018-10-30',
                'tanggal_bast' => '2018-10-30',
                'tahun' => '2018',
                'no_bast' => '1237612367123',
                'created_by' => 1,
                'created_at' => '2018-10-20 11:38:17',
                'updated_at' => '2018-10-21 09:05:04',
                'updated_by' => NULL,
                'file_bast' => 'uploads/',
            ),
            1 => 
            array (
                'id' => 3,
                'nama_paket_perusahaan' => 'Simple Project',
                'bidang' => 'Sistem Informasi',
                'lokasi_proyek' => 'New York',
                'nama_pengguna_jasa' => 'Foo Bar',
                'kategori_id' => 4,
                'alamat_pengguna_jasa' => 'Sedney',
                'no_telp_pengguna_jasa' => '01611123',
                'periode_kerja_dari' => '2018-11-01',
                'periode_kerja_sampai' => '2018-12-01',
                'no_kontrak' => '010918012',
                'nilai_kontrak' => 20000000,
                'tanggal_selesai_kontrak' => '2018-12-02',
                'tanggal_bast' => '2018-12-04',
                'tahun' => '2018',
                'no_bast' => 'uploads/uploads/',
                'created_by' => 1,
                'created_at' => '2018-10-20 13:59:17',
                'updated_at' => '2018-10-20 14:13:57',
                'updated_by' => NULL,
                'file_bast' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'nama_paket_perusahaan' => 'asdad',
                'bidang' => '213131',
                'lokasi_proyek' => '12313',
                'nama_pengguna_jasa' => '1231321',
                'kategori_id' => 2,
                'alamat_pengguna_jasa' => '12313',
                'no_telp_pengguna_jasa' => '123131',
                'periode_kerja_dari' => '2018-10-30',
                'periode_kerja_sampai' => '2018-10-29',
                'no_kontrak' => '12321312',
                'nilai_kontrak' => 123131,
                'tanggal_selesai_kontrak' => '2018-10-29',
                'tanggal_bast' => '2018-10-29',
                'tahun' => '2015',
                'no_bast' => '21312',
                'created_by' => 1,
                'created_at' => '2018-10-22 07:27:54',
                'updated_at' => NULL,
                'updated_by' => NULL,
                'file_bast' => 'uploads/1/PengalamanPerusahaan/test/Report__-_22_Oct_2018__1_.xls',
            ),
        ));
        
        
    }
}