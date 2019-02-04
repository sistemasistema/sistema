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
         $this->call([
             UserRolesTableSeeder::class,
             UserStatusesTableSeeder::class,
             BanksTableSeeder::class,
             UsersTableSeeder::class,
             ClientsTableSeeder::class,
             SuppliersTableSeeder::class,
             ProductGroupsTableSeeder::class,
             ProductSubgroupsTableSeeder::class,
             CarPartCardsTableSeeder::class,
             ManufacturersTableSeeder::class,
             CarPartsTableSeeder::class,
         ]);
    }
}
