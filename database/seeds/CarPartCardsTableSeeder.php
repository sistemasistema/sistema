<?php

use Illuminate\Database\Seeder;

class CarPartCardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('car_part_cards')->insert([
                'model' => str_random('10'),
                'title' => str_random('10'),
                'product_subgroup_id' => rand(1, 10),
                'size' => rand(1, 100),
                'weight' => rand(1, 1000).' g',
                'image' => null
            ]);
        }
    }
}
