<?php

use Illuminate\Database\Seeder;

class pajak extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pajak')->insert([
            'bank' => 1,
            'pajak' => '5000',
            'ongkir' => 1,
        ]);
        DB::table('pajak')->insert([
            'bank' => 2,
            'pajak' => '5000',
            'ongkir' => 2,
        ]);
         DB::table('pajak')->insert([
            'bank' => 3,
            'pajak' => '5000',
            'ongkir' => 3,
        ]);
    }
}
