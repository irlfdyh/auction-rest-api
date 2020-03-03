<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $userData = [
            ['level_id' => 1, 'username' => 'adminone', 'password'=>bcrypt('admin'), 'api_token'=>Str::random(10)],
            ['level_id' => 1, 'username' => 'admintwo', 'password'=>bcrypt('admin'), 'api_token'=>Str::random(10)],
            ['level_id' => 2, 'username' => 'officerone', 'password'=>bcrypt('officer'), 'api_token'=>Str::random(10)],
            ['level_id' => 2, 'username' => 'officertwo', 'password'=>bcrypt('officer'), 'api_token'=>Str::random(10)],
            ['level_id' => 3, 'username' => 'societyone', 'password'=>bcrypt('society'), 'api_token'=>Str::random(10)],
            ['level_id' => 3, 'username' => 'societytwo', 'password'=>bcrypt('society'), 'api_token'=>Str::random(10)],
            ['level_id' => 3, 'username' => 'societythree', 'password'=>bcrypt('society'), 'api_token'=>Str::random(10)],
            ['level_id' => 3, 'username' => 'societyfour', 'password'=>bcrypt('society'), 'api_token'=>Str::random(10)],
            ['level_id' => 3, 'username' => 'societyfive', 'password'=>bcrypt('society'), 'api_token'=>Str::random(10)],
            ['level_id' => 3, 'username' => 'societysix', 'password'=>bcrypt('society'), 'api_token'=>Str::random(10)],
            ['level_id' => 3, 'username' => 'societyseven', 'password'=>bcrypt('society'), 'api_token'=>Str::random(10)],
            ['level_id' => 3, 'username' => 'societyeight', 'password'=>bcrypt('society'), 'api_token'=>Str::random(10)],
            ['level_id' => 3, 'username' => 'societynine', 'password'=>bcrypt('society'), 'api_token'=>Str::random(10)],
            ['level_id' => 3, 'username' => 'societyten', 'password'=>bcrypt('society'), 'api_token'=>Str::random(10)],

        ];

        foreach ($userData as $data) {
            User::create($data);
        }
    }
}
