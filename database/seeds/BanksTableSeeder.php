<?php

use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
            ['title' => 'Swedbank', 'code' => 'HABALV22'],
            ['title' => 'Citadele', 'code' => 'PARXLV22'],
            ['title' => 'SEB', 'code' => 'UNLALV2X'],
            ['title' => 'DNB', 'code' => 'RIKOLV2X'],
            ['title' => 'Nordea', 'code' => 'NDEALV2X'],
            ['title' => 'Privatbank', 'code' => 'PRTTLV22'],
            ['title' => 'Danske Bank', 'code' => 'MARALV22'],
        ]);
    }
}
