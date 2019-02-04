<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id' => 1, 'first_name' => 'Admin', 'last_name' => 'Admin', 'personal_code' => NULL, 'position' => NULL, 'street' => NULL, 'city' => NULL, 'country' => NULL, 'postcode' => NULL, 'mobile_phone_number' => NULL, 'phone_number' => NULL, 'fax' => NULL, 'email' => 'admin@sistema.lv', 'password' =>  bcrypt('admin'), 'bank_id' => NULL, 'bank_account_number' => NULL, 'role_id' => 1, 'status_id' => 1],
            ['id' => 2, 'first_name' => 'User', 'last_name' => 'User', 'personal_code' => NULL, 'position' => NULL, 'street' => NULL, 'city' => NULL, 'country' => NULL, 'postcode' => NULL, 'mobile_phone_number' => NULL, 'phone_number' => NULL, 'fax' => NULL, 'email' => 'user@sistema.lv', 'password' =>  bcrypt('user'), 'bank_id' => NULL, 'bank_account_number' => NULL, 'role_id' => 2, 'status_id' => 1],
        ]);
    }
}
