<?php

use Illuminate\Database\Seeder;
use App\Society;

class SocietiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $societies = [
            ['user_id' => 5, 'society_name' => 'Fadil Nugrah', 'phone' => '085123456789', 'status' => 'active'],
            ['user_id' => 6, 'society_name' => 'Galuh Firman', 'phone' => '085123456790', 'status' => 'active'],
            ['user_id' => 7, 'society_name' => 'John Doe', 'phone' => '085123456791', 'status' => 'active'],
            ['user_id' => 8, 'society_name' => 'Mekel Tan', 'phone' => '085123456792', 'status' => 'active'],
            ['user_id' => 9, 'society_name' => 'Sinthya Labes', 'phone' => '085123456793', 'status' => 'active'],
            ['user_id' => 10, 'society_name' => 'Faras Alfa', 'phone' => '085123456794', 'status' => 'active'],
            ['user_id' => 11, 'society_name' => 'Sai Sera', 'phone' => '085123456795', 'status' => 'active'],
            ['user_id' => 12, 'society_name' => 'Ala Nurala', 'phone' => '085123456796', 'status' => 'active'],
            ['user_id' => 13, 'society_name' => 'Caca Anisa', 'phone' => '085123456797', 'status' => 'active'],
            ['user_id' => 14, 'society_name' => 'Puput Putri', 'phone' => '085123456798', 'status' => 'active']
        ];

        foreach ($societies as $society) {
            Society::create($society);
        }
    }
}
