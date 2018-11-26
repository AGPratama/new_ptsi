<?php

use Illuminate\Database\Seeder;

class CmsStatisticComponentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cms_statistic_components')->delete();
        
        \DB::table('cms_statistic_components')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_cms_statistics' => 1,
                'componentID' => 'd9239ad1e327bc5f04ab4e1126b110b1',
                'component_name' => 'smallbox',
                'area_name' => 'area1',
                'sorting' => 0,
                'name' => 'Untitled',
                'config' => NULL,
                'created_at' => '2018-10-18 14:49:31',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'id_cms_statistics' => 1,
                'componentID' => '7df62032a751fda4153608942aeeab44',
                'component_name' => 'chartarea',
                'area_name' => 'area2',
                'sorting' => 0,
                'name' => NULL,
                'config' => '{"name":"Testing","sql":"Test;","area_name":"Test","goals":"10"}',
                'created_at' => '2018-10-18 14:49:36',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'id_cms_statistics' => 1,
                'componentID' => '22e099bc5f28bbf5a46f6492fba8ad68',
                'component_name' => 'chartline',
                'area_name' => 'area3',
                'sorting' => 0,
                'name' => 'Untitled',
                'config' => NULL,
                'created_at' => '2018-10-18 14:49:41',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'id_cms_statistics' => 1,
                'componentID' => 'a7fa3a693fda10dbd35422333e483497',
                'component_name' => 'chartbar',
                'area_name' => 'area4',
                'sorting' => 0,
                'name' => 'Untitled',
                'config' => NULL,
                'created_at' => '2018-10-18 14:49:46',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}