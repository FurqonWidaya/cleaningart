<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\art;
use App\master;
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
            'role' => 1,
            'email' => 'adminku@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'remember_token' => str_random(60),
        ]);

        $users = factory(User::class,10)->create();
          foreach( $users as $user)
          {
            factory(art::class)->create([
            'user_id' => $user->id

       ]);

     }

       // DB::table('users')->join('master', 'master.user_id', '=', 'users.id')->
       // insert([
       //      'role' => 2,
       //      'email' => 'masterku@gmail.com',
       //      'username' => 'master',
       //      'password' => bcrypt('master'),
       //      'remember_token' => str_random(60),
       //
       //  ]);

}
}
