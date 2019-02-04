<?php

use Illuminate\Database\Seeder;

class CarPartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            DB::table('car_parts')->insert([
                'original_code' => str_random(10),
                'manufacturer_id' => rand(1, 10),
                'car_part_card_id' => rand(1, 10)
            ]);
        }
    }
}
