<?php

use Illuminate\Database\Seeder;

class CmsStatisticsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cms_statistics')->delete();
        
        \DB::table('cms_statistics')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'TEst',
                'slug' => 'test',
                'created_at' => '2018-10-18 14:48:47',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}