<?php

use Illuminate\Database\Seeder;

class CmsNotificationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cms_notifications')->delete();
        
        \DB::table('cms_notifications')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_cms_users' => 1,
                'content' => 'test test',
                'url' => '/admin/module_generator',
                'is_read' => 1,
                'created_at' => '2018-10-17 03:14:00',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}