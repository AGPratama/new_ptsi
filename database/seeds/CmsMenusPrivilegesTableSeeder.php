<?php

use Illuminate\Database\Seeder;

class CmsMenusPrivilegesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cms_menus_privileges')->delete();
        
        \DB::table('cms_menus_privileges')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_cms_menus' => 1,
                'id_cms_privileges' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'id_cms_menus' => 2,
                'id_cms_privileges' => 1,
            ),
            2 => 
            array (
                'id' => 5,
                'id_cms_menus' => 4,
                'id_cms_privileges' => 1,
            ),
            3 => 
            array (
                'id' => 6,
                'id_cms_menus' => 4,
                'id_cms_privileges' => 2,
            ),
            4 => 
            array (
                'id' => 7,
                'id_cms_menus' => 3,
                'id_cms_privileges' => 1,
            ),
            5 => 
            array (
                'id' => 8,
                'id_cms_menus' => 3,
                'id_cms_privileges' => 2,
            ),
            6 => 
            array (
                'id' => 19,
                'id_cms_menus' => 7,
                'id_cms_privileges' => 1,
            ),
            7 => 
            array (
                'id' => 20,
                'id_cms_menus' => 7,
                'id_cms_privileges' => 2,
            ),
            8 => 
            array (
                'id' => 21,
                'id_cms_menus' => 5,
                'id_cms_privileges' => 1,
            ),
            9 => 
            array (
                'id' => 23,
                'id_cms_menus' => 10,
                'id_cms_privileges' => 1,
            ),
            10 => 
            array (
                'id' => 26,
                'id_cms_menus' => 6,
                'id_cms_privileges' => 1,
            ),
            11 => 
            array (
                'id' => 27,
                'id_cms_menus' => 6,
                'id_cms_privileges' => 2,
            ),
            12 => 
            array (
                'id' => 28,
                'id_cms_menus' => 6,
                'id_cms_privileges' => 3,
            ),
            13 => 
            array (
                'id' => 29,
                'id_cms_menus' => 9,
                'id_cms_privileges' => 1,
            ),
            14 => 
            array (
                'id' => 30,
                'id_cms_menus' => 9,
                'id_cms_privileges' => 3,
            ),
            15 => 
            array (
                'id' => 31,
                'id_cms_menus' => 8,
                'id_cms_privileges' => 1,
            ),
            16 => 
            array (
                'id' => 32,
                'id_cms_menus' => 8,
                'id_cms_privileges' => 3,
            ),
            17 => 
            array (
                'id' => 33,
                'id_cms_menus' => 11,
                'id_cms_privileges' => 1,
            ),
            18 => 
            array (
                'id' => 34,
                'id_cms_menus' => 11,
                'id_cms_privileges' => 3,
            ),
            19 => 
            array (
                'id' => 35,
                'id_cms_menus' => 12,
                'id_cms_privileges' => 1,
            ),
            20 => 
            array (
                'id' => 36,
                'id_cms_menus' => 12,
                'id_cms_privileges' => 3,
            ),
        ));
        
        
    }
}