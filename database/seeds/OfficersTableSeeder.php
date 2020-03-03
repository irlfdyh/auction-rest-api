<?php

use Illuminate\Database\Seeder;
use App\Officer;

class OfficersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $officers = [
            ['user_id' => 1, 'officer_name' => 'Rafi Septian', 'status' => 'active'],
            ['user_id' => 2, 'officer_name' => 'Kecap Suba', 'status' => 'active'],
            ['user_id' => 3, 'officer_name' => 'Dadan Kapal', 'status' => 'active'],
            ['user_id' => 4, 'officer_name' => 'Agus Gustus', 'status' => 'active'],
        ];

        foreach ($officers as $officer) {
            Officer::create($officer);
        }
    }
}
