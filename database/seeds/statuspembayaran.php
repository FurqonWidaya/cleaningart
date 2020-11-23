<?php

use Illuminate\Database\Seeder;

class statuspembayaran extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuspembayaran')->insert([
            'statuspembayaran' => 1,
        ]);
        DB::table('statuspembayaran')->insert([
            'statuspembayaran' => 2,
        ]);
    }
}
