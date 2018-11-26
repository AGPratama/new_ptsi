<?php

use Illuminate\Database\Seeder;

class SiswaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('siswa')->delete();
        
        \DB::table('siswa')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Dudi Iskandar',
                'alamat' => 'bogor',
                'image' => 'uploads/1/2018-10/f147e140_33cd_4770_827f_d336c0108411_1.jpg',
                'user_id' => 1,
                'created_at' => NULL,
                'updated_at' => '2018-10-14 01:21:39',
                'deleted_at' => '2018-10-14 01:22:21',
            ),
            1 => 
            array (
                'id' => 7,
                'nama' => 'kiw',
                'alamat' => 'bogor',
                'image' => 'uploads/1/2018-10/f147e140_33cd_4770_827f_d336c0108411_1.jpg',
                'user_id' => 1,
                'created_at' => NULL,
                'updated_at' => '2018-10-14 01:21:39',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 8,
                'nama' => 'rizqi',
                'alamat' => 'asda',
                'image' => 'uploads/1/2018-10/f147e140_33cd_4770_827f_d336c0108411_1.jpg',
                'user_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 9,
                'nama' => 'Dudi Iskandar',
                'alamat' => 'Jauh Pake Helm',
                'image' => 'uploads/1/2018-10/2.jpg',
                'user_id' => 1,
                'created_at' => '2018-10-18 14:23:02',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 10,
                'nama' => 'sdada',
                'alamat' => 'asda',
                'image' => 'uploads/1/2018-10/26230462_338836063260327_1700062373891403441_n.jpg',
                'user_id' => 1,
                'created_at' => '2018-10-16 23:41:38',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 14,
                'nama' => '',
                'alamat' => 'test',
                'image' => '',
                'user_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}