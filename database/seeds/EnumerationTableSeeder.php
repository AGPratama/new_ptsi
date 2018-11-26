<?php

use Illuminate\Database\Seeder;

class EnumerationTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('enumeration')->delete();
        
        \DB::table('enumeration')->insert(array (
            0 => 
            array (
                'id' => 2,
                'key' => 'KategoriPenggunaJasa',
                'value' => 'BUMN',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'key' => 'KategoriPenggunaJasa',
                'value' => 'Kementrian',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'key' => 'KategoriPenggunaJasa',
                'value' => 'Swasta',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'key' => 'Teknik',
                'value' => 'Manajemen',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'key' => 'Teknik',
                'value' => 'Manajemen Informatika',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            5 => 
            array (
                'id' => 7,
                'key' => 'Teknik',
                'value' => 'Pemasaran',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            6 => 
            array (
                'id' => 8,
                'key' => 'Teknik',
                'value' => 'Sistem Komputer',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            7 => 
            array (
                'id' => 9,
                'key' => 'Teknik',
                'value' => 'Sistem Perkapalan',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            8 => 
            array (
                'id' => 10,
                'key' => 'Teknik',
                'value' => 'Teknik',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            9 => 
            array (
                'id' => 12,
                'key' => 'Strata',
                'value' => 'D3',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            10 => 
            array (
                'id' => 15,
                'key' => 'Strata',
                'value' => 'S1',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            11 => 
            array (
                'id' => 16,
                'key' => 'Strata',
                'value' => 'S2',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            12 => 
            array (
                'id' => 17,
                'key' => 'KondisiPeralatan',
                'value' => 'Baik',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'updated_by' => NULL,
            ),
            13 => 
            array (
                'id' => 18,
                'key' => 'KondisiPeralatan',
                'value' => 'Tidak Baik',
                'created_by' => 1,
                'created_at' => NULL,
                'updated_at' => '2018-10-19 09:00:44',
                'updated_by' => 1,
            ),
        ));
        
        
    }
}