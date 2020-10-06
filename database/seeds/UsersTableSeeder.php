<?php
use App\User;
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
        'name'=> "Admin",
        'email' => 'greensutha@uinjambi.ac.id',
        'password' => bcrypt('ADMINGREENSUTHA2020'),
        'role' => 'superadmin'
      ];

      //DB::table('users')->insert($data);
      User::create($data);
    }
}
