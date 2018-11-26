<?php

use Illuminate\Database\Seeder;

class CmsUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cms_users')->delete();
        
        \DB::table('cms_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Super Admin',
                'photo' => 'uploads/1/2018-10/untitled.png',
                'email' => 'admin@surveyor.id',
                'password' => '$2y$10$QaSjOfYA7lKfvuqidXyxQOZ5EjGLUp3duynbdnwbWmPv4x23tW242',
                'id_cms_privileges' => 1,
                'created_at' => '2018-10-18 06:59:15',
                'updated_at' => '2018-10-18 12:48:05',
                'status' => 'Active',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Team Marketing',
                'photo' => 'uploads/1/2018-10/untitled.png',
                'email' => 'marketing@surveyor.id',
                'password' => '$2y$10$99jS.6zAsv5YHAUbEdE.2uYGVkCP/M1jpP7NOhYNbJ/fwTEtcRKMK',
                'id_cms_privileges' => 2,
                'created_at' => '2018-10-18 12:48:42',
                'updated_at' => NULL,
                'status' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Team Tender',
                'photo' => 'uploads/1/2018-10/untitled.png',
                'email' => 'tender@surveyor.id',
                'password' => '$2y$10$JtF201QEHxg2Yn6wvP4bJuP7U5SUYIRHTVkmyNFK41DxuuqZdrUMC',
                'id_cms_privileges' => 3,
                'created_at' => '2018-10-18 12:49:20',
                'updated_at' => NULL,
                'status' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Verifikator',
                'photo' => 'uploads/1/2018-10/untitled.png',
                'email' => 'verivikator@surveyor.id',
                'password' => '$2y$10$2JvX8jZ9pVlgB.nBTO.Iw.7d.3eeoxPki8Vj5.j8MQK9LL00tua1a',
                'id_cms_privileges' => 4,
                'created_at' => '2018-10-18 12:49:50',
                'updated_at' => NULL,
                'status' => NULL,
            ),
        ));
        
        
    }
}