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
      $data = [
        'name'=> 'Krisman Pratama Simanjuntak',
        'email' => 'krismanpratama@gmail.com',
        'password' => bcrypt('zzzzzzzz'),
        'role' => 'superadmin'
      ];

      DB::table('users')->insert($data);
    }
}
