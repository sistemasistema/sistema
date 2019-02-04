<?php

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('suppliers')->insert([
                'company_name' => 'SIA ' . str_random(5),
                'registration_number' => str_random(11),
                'vat_code' => 'LV' . str_random(11),
                'street_l_a' => str_random(5) . ' iela' . rand(1, 200),
                'city_l_a' => str_random(7),
                'country_l_a' => str_random(7),
                'postcode_l_a' => 'LV-' . rand(1000, 9999),
                'street_a_a' => str_random(5) . ' iela' . rand(1, 200),
                'city_a_a' => str_random(7),
                'country_a_a' => str_random(7),
                'postcode_a_a' => 'LV-' . rand(1000, 9999),
                'homepage' => 'http://www.' . str_random(5) . '.lv',
                'head_name' => 'A' . str_random(7),
                'head_surname' => 'A' . str_random(7),
                'mobile_phone_number' => '+3712' . rand(1000000, 9999999),
                'phone_number' => '+3716' . rand(1000000, 9999999),
                'fax' => '+3716' . rand(1000000, 9999999),
                'email' => str_random(10) . '@gmail.com',
                'bank_id' => rand(1, 7),
                'bank_account_number' => 'LV' . str_random(19)
            ]);
        }
    }
}
