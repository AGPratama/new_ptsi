<?php

use Illuminate\Database\Seeder;

class suratkorespondensiseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('surat_korespondensi')->insert(array (
            0 =>
            array(
                'name'=>'Surat Pernyataan',
                'location'=>'uploads/suratkorespondensi/surat-pernyataan.doc',
            ),
            1=>
            array(
                'name'=>'Pakta Integritas',
                'location'=>'uploads/suratkorespondensi/pakta-integritas.doc',
            ),
            2 =>
            array(
                'name'=>'Surat Kuasa',
                'location'=>'uploads/suratkorespondensi/surat-kuasa.doc',
            ),
            3=>
            array(
                'name'=>'Surat Kuasa 2',
                'location'=>'uploads/suratkorespondensi/surat-kuasa-2.doc',
            ),
            4 =>
            array(
                'name'=>'Surat Permohonan referensi Bank',
                'location'=>'uploads/suratkorespondensi/surat-permohonan-referensi-bank.doc',
            ),
            5=>
            array(
                'name'=>'Surat Pernyataan Kebenaran Dokumen',
                'location'=>'uploads/suratkorespondensi/surat-pernyataan-kebenaran-dokumen.doc',
            ),
            6 =>
            array(
                'name'=>'Surat Pernyataan Memiliki Kemampuan Sesuai Bidang',
                'location'=>'uploads/suratkorespondensi/surat-pernyataan-memiliki-kemampuan-sesuai-bidang.doc',
            ),
            7=>
            array(
                'name'=>'Surat Pernyataan Memiliki Tenaga Ahli Sesuai Tugas',
                'location'=>'uploads/suratkorespondensi/surat-pernyataan-memiliki-tenaga-ahli-sesuai-tugas.doc',
            ),
            8 =>
            array(
                'name'=>'Surat Pernyataan Mengahadirkan Tenaga Ahli saat Negosiasi',
                'location'=>'uploads/suratkorespondensi/surat-pernyataan-menghadirkan-tenaga-ahli-saat-negosiasi.doc',
            ),
            9=>
            array(
                'name'=>'Surat Pernyataan Menyediakan Fasilitas',
                'location'=>'uploads/suratkorespondensi/surat-pernyataan-menyediakan-fasilitas.doc',
            ),
            10 =>
            array(
                'name'=>'Surat Pernyataan Menyediakan Tenaga Ahli',
                'location'=>'uploads/suratkorespondensi/surat-pernyataan-menyediakan-tenaga-ahli.doc',
            ),
            11=>
            array(
                'name'=>'Surat Pernyataan Minat',
                'location'=>'uploads/suratkorespondensi/surat-pernyataan-minat.doc',
            ),
            12 =>
            array(
                'name'=>'Surat Pernyataan Patuh Pada Peraturan',
                'location'=>'uploads/suratkorespondensi/surat-pernyataan-patuh-pada-peraturan.doc',
            ),
            13=>
            array(
                'name'=>'Surat Pernyataan Sanggup Menyelesaikan Sesuai Jadwal',
                'location'=>'uploads/suratkorespondensi/surat-pernyataan-sanggup-menyelesaikan-sesuai-jadwal.doc',
            ),
            14=>
            array(
                'name'=>'Surat Pernyataan Tidak Masuk Daftar Hitam',
                'location'=>'uploads/suratkorespondensi/surat-pernyataan-tidak-masuk-daftar-hitam.doc',
            ),
            15=>
            array(
                'name'=>'Surat Pernyataan Tidak Menuntut',
                'location'=>'uploads/suratkorespondensi/surat-pernyataan-tidak-menuntut.doc',
            ),
            16=>
            array(
                'name'=>'Surat Pernyataan Tidak Pailit',
                'location'=>'uploads/suratkorespondensi/surat-pernyataan-tidak-pailit.doc',
            ),
        ));
    }
}
