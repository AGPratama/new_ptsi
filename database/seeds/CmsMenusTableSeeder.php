<?php

use Illuminate\Database\Seeder;

class CmsMenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cms_menus')->delete();
        
        \DB::table('cms_menus')->insert(array (
            0 => 
            array (
                'id' => 5,
                'name' => 'Enumeration',
                'type' => 'Route',
                'path' => 'AdminEnumerationControllerGetIndex',
                'color' => 'normal',
                'icon' => 'fa fa-bars',
                'parent_id' => 6,
                'is_active' => 1,
                'is_dashboard' => 0,
                'id_cms_privileges' => 1,
                'sorting' => 1,
                'created_at' => '2018-10-19 07:49:20',
                'updated_at' => '2018-10-19 22:12:52',
            ),
            1 => 
            array (
                'id' => 6,
                'name' => 'Master Data',
                'type' => 'Module',
                'path' => 'enumeration',
                'color' => 'normal',
                'icon' => 'fa fa-th-large',
                'parent_id' => 0,
                'is_active' => 1,
                'is_dashboard' => 0,
                'id_cms_privileges' => 1,
                'sorting' => 1,
                'created_at' => '2018-10-19 07:52:04',
                'updated_at' => '2018-10-21 09:17:13',
            ),
            2 => 
            array (
                'id' => 7,
                'name' => 'Daftar Pelanggan',
                'type' => 'Route',
                'path' => 'AdminPelangganControllerGetIndex',
                'color' => 'normal',
                'icon' => 'fa fa-users',
                'parent_id' => 6,
                'is_active' => 1,
                'is_dashboard' => 0,
                'id_cms_privileges' => 1,
                'sorting' => 2,
                'created_at' => '2018-10-19 08:04:07',
                'updated_at' => '2018-10-19 09:55:51',
            ),
            3 => 
            array (
                'id' => 8,
                'name' => 'Daftar Tenaga Kerja',
                'type' => 'Route',
                'path' => 'AdminTenagaKerjaControllerGetIndex',
                'color' => 'normal',
                'icon' => 'fa fa-user',
                'parent_id' => 6,
                'is_active' => 1,
                'is_dashboard' => 0,
                'id_cms_privileges' => 1,
                'sorting' => 4,
                'created_at' => '2018-10-19 09:18:42',
                'updated_at' => '2018-10-21 09:17:52',
            ),
            4 => 
            array (
                'id' => 9,
                'name' => 'Daftar Peralatan',
                'type' => 'Route',
                'path' => 'AdminPeralatanControllerGetIndex',
                'color' => 'normal',
                'icon' => 'fa fa-cog',
                'parent_id' => 6,
                'is_active' => 1,
                'is_dashboard' => 0,
                'id_cms_privileges' => 1,
                'sorting' => 3,
                'created_at' => '2018-10-19 22:22:59',
                'updated_at' => '2018-10-21 09:17:37',
            ),
            5 => 
            array (
                'id' => 10,
                'name' => 'Surat Ijin Usaha',
                'type' => 'Route',
                'path' => 'AdminSuratIjinUsahaControllerGetIndex',
                'color' => NULL,
                'icon' => 'fa fa-file-text-o',
                'parent_id' => 6,
                'is_active' => 1,
                'is_dashboard' => 0,
                'id_cms_privileges' => 1,
                'sorting' => 5,
                'created_at' => '2018-10-19 22:43:32',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 11,
                'name' => 'Syarat Kualifikasi',
                'type' => 'Route',
                'path' => 'AdminSyaratKualifikasiControllerGetIndex',
                'color' => 'normal',
                'icon' => 'fa fa-file-text-o',
                'parent_id' => 6,
                'is_active' => 1,
                'is_dashboard' => 0,
                'id_cms_privileges' => 1,
                'sorting' => 6,
                'created_at' => '2018-10-19 22:51:48',
                'updated_at' => '2018-10-21 09:18:27',
            ),
            7 => 
            array (
                'id' => 12,
                'name' => 'Pengalaman perusahaan',
                'type' => 'Route',
                'path' => 'AdminPengalamanPerusahaanControllerGetIndex',
                'color' => 'normal',
                'icon' => 'fa fa-fax',
                'parent_id' => 6,
                'is_active' => 1,
                'is_dashboard' => 0,
                'id_cms_privileges' => 1,
                'sorting' => 7,
                'created_at' => '2018-10-19 23:02:45',
                'updated_at' => '2018-10-21 09:18:40',
            ),
        ));
        
        
    }
}