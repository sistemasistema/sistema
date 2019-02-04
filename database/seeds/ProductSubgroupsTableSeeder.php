<?php

use Illuminate\Database\Seeder;

class ProductSubgroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 50; $i++) {
            DB::table('product_subgroups')->insert([
                'title' => str_random('7'),
                'product_group_id' => rand(1, 10)
            ]);
        }
    }
}
