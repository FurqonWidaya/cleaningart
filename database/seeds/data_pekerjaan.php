<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class data_pekerjaan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // DB::table('paket_pekerjaan')->insert([
      //      'nama_paket' => 'all clean',
      //      'harga_paket' => 1000000,
      //      'deskripsi_paket' => 'loremipsum dsadsadsadsadsadsa',
      //  ]);
        $faker = Faker::create('id_ID');
        foreach(range(0,10) as $i){
      		DB::table('paket_pekerjaan')->insert([
            'nama_paket' => $faker->bothify('Paket ##??'),
            'harga_paket' => $faker->numberBetween($min = 50000, $max = 900000),
            'deskripsi_paket' => $faker->realText($maxNbChars = 50, $indexSize = 2),
      		]);

      	}
    }
}
