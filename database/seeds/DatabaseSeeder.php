<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        // $this->call(CmsApicustomTableSeeder::class);
        // $this->call(CmsApikeyTableSeeder::class);
        // $this->call(CmsDashboardTableSeeder::class);
        // $this->call(CmsEmailQueuesTableSeeder::class);
        // $this->call(CmsEmailTemplatesTableSeeder::class);
        // $this->call(CmsLogsTableSeeder::class);
        // $this->call(CmsMenusTableSeeder::class);
        // $this->call(CmsMenusPrivilegesTableSeeder::class);
        // $this->call(CmsModulsTableSeeder::class);
        // $this->call(CmsNotificationsTableSeeder::class);
        // $this->call(CmsPrivilegesTableSeeder::class);
        // $this->call(CmsPrivilegesRolesTableSeeder::class);
        // $this->call(CmsSettingsTableSeeder::class);
        // $this->call(CmsStatisticsTableSeeder::class);
        // $this->call(CmsStatisticComponentsTableSeeder::class);
        // $this->call(CmsUsersTableSeeder::class);
        $this->call(EnumerationTableSeeder::class);
        $this->call(MigrationsTableSeeder::class);
        $this->call(PelangganTableSeeder::class);
        $this->call(PengalamanPerusahaanTableSeeder::class);
        $this->call(PeralatanTableSeeder::class);
        $this->call(SiswaTableSeeder::class);
        $this->call(SuratIjinUsahaTableSeeder::class);
        $this->call(SyaratKualifikasiTableSeeder::class);
        $this->call(TenagaKerjaTableSeeder::class);
    }
}
