<?php

use Illuminate\Database\Seeder;
use App\User;
use App\master;
class masterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master')->insert([
            'name' => 'Paijo Paijo',
            'nohp' => '082333123112',
            'kecamatan' => 'Sumbersari',
            'alamat' => 'Jl kelinci',
            'kodepos' => '68777'
        ]);
       
    }
}
