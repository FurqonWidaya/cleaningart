<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\master;
use Faker\generator as Faker;

$factory->define(master::class, function (Faker $faker) {
    return [
      'user_id' => $faker->numberBetween($min = 5, $max = 9000),
      'name'=> $faker->name,
      'nohp'=>$faker->phoneNumber,
      'kecamatan'=>$faker->citySuffix,
      'alamat'=>$faker->address,
      'kodepos'=>$faker->postcode,
    ];
});
