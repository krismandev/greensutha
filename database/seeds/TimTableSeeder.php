<?php
use App\Tim;
use App\User;
use Illuminate\Database\Seeder;

class TimTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $data = [
        'user_id' => 3,
        'posisi' => 'Admin',
      ];

      Tim::create($data);
    }
}
