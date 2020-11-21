<?php

use Illuminate\Database\Seeder;

class time_up extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('time_up')->insert([
            'time_up' => '24:00:00',
        ]);
    }
}
