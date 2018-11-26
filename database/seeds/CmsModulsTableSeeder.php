<?php

use Illuminate\Database\Seeder;

class CmsModulsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cms_moduls')->delete();
        
        \DB::table('cms_moduls')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Notifications',
                'icon' => 'fa fa-cog',
                'path' => 'notifications',
                'table_name' => 'cms_notifications',
                'controller' => 'NotificationsController',
                'is_protected' => 1,
                'is_active' => 1,
                'created_at' => '2018-10-18 06:59:16',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Privileges',
                'icon' => 'fa fa-cog',
                'path' => 'privileges',
                'table_name' => 'cms_privileges',
                'controller' => 'PrivilegesController',
                'is_protected' => 1,
                'is_active' => 1,
                'created_at' => '2018-10-18 06:59:16',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Privileges Roles',
                'icon' => 'fa fa-cog',
                'path' => 'privileges_roles',
                'table_name' => 'cms_privileges_roles',
                'controller' => 'PrivilegesRolesController',
                'is_protected' => 1,
                'is_active' => 1,
                'created_at' => '2018-10-18 06:59:16',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Users Management',
                'icon' => 'fa fa-users',
                'path' => 'users',
                'table_name' => 'cms_users',
                'controller' => 'AdminCmsUsersController',
                'is_protected' => 0,
                'is_active' => 1,
                'created_at' => '2018-10-18 06:59:16',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Settings',
                'icon' => 'fa fa-cog',
                'path' => 'settings',
                'table_name' => 'cms_settings',
                'controller' => 'SettingsController',
                'is_protected' => 1,
                'is_active' => 1,
                'created_at' => '2018-10-18 06:59:16',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Module Generator',
                'icon' => 'fa fa-database',
                'path' => 'module_generator',
                'table_name' => 'cms_moduls',
                'controller' => 'ModulsController',
                'is_protected' => 1,
                'is_active' => 1,
                'created_at' => '2018-10-18 06:59:16',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Menu Management',
                'icon' => 'fa fa-bars',
                'path' => 'menu_management',
                'table_name' => 'cms_menus',
                'controller' => 'MenusController',
                'is_protected' => 1,
                'is_active' => 1,
                'created_at' => '2018-10-18 06:59:16',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Email Templates',
                'icon' => 'fa fa-envelope-o',
                'path' => 'email_templates',
                'table_name' => 'cms_email_templates',
                'controller' => 'EmailTemplatesController',
                'is_protected' => 1,
                'is_active' => 1,
                'created_at' => '2018-10-18 06:59:16',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Statistic Builder',
                'icon' => 'fa fa-dashboard',
                'path' => 'statistic_builder',
                'table_name' => 'cms_statistics',
                'controller' => 'StatisticBuilderController',
                'is_protected' => 1,
                'is_active' => 1,
                'created_at' => '2018-10-18 06:59:16',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'API Generator',
                'icon' => 'fa fa-cloud-download',
                'path' => 'api_generator',
                'table_name' => '',
                'controller' => 'ApiCustomController',
                'is_protected' => 1,
                'is_active' => 1,
                'created_at' => '2018-10-18 06:59:16',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Log User Access',
                'icon' => 'fa fa-flag-o',
                'path' => 'logs',
                'table_name' => 'cms_logs',
                'controller' => 'LogsController',
                'is_protected' => 1,
                'is_active' => 1,
                'created_at' => '2018-10-18 06:59:16',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'siswa',
                'icon' => 'fa fa-users',
                'path' => 'siswa',
                'table_name' => 'siswa',
                'controller' => 'AdminSiswaController',
                'is_protected' => 0,
                'is_active' => 0,
                'created_at' => '2018-10-18 07:06:43',
                'updated_at' => NULL,
                'deleted_at' => '2018-10-18 07:38:17',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Daftar Siswa',
                'icon' => 'fa fa-users',
                'path' => 'Siswa',
                'table_name' => 'siswa',
                'controller' => 'AdminSiswaController',
                'is_protected' => 0,
                'is_active' => 0,
                'created_at' => '2018-10-18 07:39:42',
                'updated_at' => NULL,
                'deleted_at' => '2018-10-19 07:36:36',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Daftar Pelanggan',
                'icon' => 'fa fa-users',
                'path' => 'tabel_pelanggan',
                'table_name' => 'tabel_pelanggan',
                'controller' => 'AdminTabelPelangganController',
                'is_protected' => 0,
                'is_active' => 0,
                'created_at' => '2018-10-18 13:21:11',
                'updated_at' => NULL,
                'deleted_at' => '2018-10-19 07:36:24',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Kategori Pengguna Jasa',
                'icon' => 'fa fa-glass',
                'path' => 'tabel_kategori_pengguna_jasa',
                'table_name' => 'tabel_kategori_pengguna_jasa',
                'controller' => 'AdminKategoriPenggunaJasaController',
                'is_protected' => 0,
                'is_active' => 0,
                'created_at' => '2018-10-18 13:32:33',
                'updated_at' => NULL,
                'deleted_at' => '2018-10-19 07:33:04',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Enumeration',
                'icon' => 'fa fa-bars',
                'path' => 'enumeration',
                'table_name' => 'enumeration',
                'controller' => 'AdminEnumerationController',
                'is_protected' => 0,
                'is_active' => 0,
                'created_at' => '2018-10-19 07:49:19',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Daftar Pelanggan',
                'icon' => 'fa fa-users',
                'path' => 'pelanggan',
                'table_name' => 'pelanggan',
                'controller' => 'AdminPelangganController',
                'is_protected' => 0,
                'is_active' => 0,
                'created_at' => '2018-10-19 08:04:06',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Daftar Tenaga Kerja',
                'icon' => 'fa fa-user',
                'path' => 'tenaga_kerja',
                'table_name' => 'tenaga_kerja',
                'controller' => 'AdminTenagaKerjaController',
                'is_protected' => 0,
                'is_active' => 0,
                'created_at' => '2018-10-19 09:18:42',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Daftar Peralatan',
                'icon' => 'fa fa-cog',
                'path' => 'peralatan',
                'table_name' => 'peralatan',
                'controller' => 'AdminPeralatanController',
                'is_protected' => 0,
                'is_active' => 0,
                'created_at' => '2018-10-19 22:22:58',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Surat Ijin Usaha',
                'icon' => 'fa fa-file-text-o',
                'path' => 'surat_ijin_usaha',
                'table_name' => 'surat_ijin_usaha',
                'controller' => 'AdminSuratIjinUsahaController',
                'is_protected' => 0,
                'is_active' => 0,
                'created_at' => '2018-10-19 22:43:32',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Syarat Kualifikasi',
                'icon' => 'fa fa-file-text-o',
                'path' => 'syarat_kualifikasi',
                'table_name' => 'syarat_kualifikasi',
                'controller' => 'AdminSyaratKualifikasiController',
                'is_protected' => 0,
                'is_active' => 0,
                'created_at' => '2018-10-19 22:51:47',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Pengalaman perusahaan',
                'icon' => 'fa fa-fax',
                'path' => 'pengalaman_perusahaan',
                'table_name' => 'pengalaman_perusahaan',
                'controller' => 'AdminPengalamanPerusahaanController',
                'is_protected' => 0,
                'is_active' => 0,
                'created_at' => '2018-10-19 23:02:44',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}