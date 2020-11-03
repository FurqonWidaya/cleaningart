<?php

use Illuminate\Database\Seeder;
use App\User;
use App\art;
class artSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('art')->insert([
            'name' => 'Paimin Paimin',
            //'tanggallahir' => '28/02/1999',
            'nohp' => '082333123112',
            'kecamatan' => 'Sumbersari',
            'alamat' => 'Jl kelinci',
            'kodepos' => '68777',
            'status' => 1,
        ]);
    }
}
