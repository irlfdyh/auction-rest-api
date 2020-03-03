<?php

use Illuminate\Database\Seeder;
use App\Stuff;

class StuffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stuffs = [
            ['category_id' => 1, 'stuff_name' => 'Fidget Spinner', 'started_price' => 20000, 'description' => 'fidget spinner viral beberapa tahun ke belakang', 'date' => '2020-02-22'],
            ['category_id' => 1, 'stuff_name' => 'Gitar Akustik', 'started_price' => 1000000, 'description' => 'gitar akustik dari kayu mahony', 'date' => '2020-02-22'],
            ['category_id' => 1, 'stuff_name' => 'Ruby Segi 4', 'started_price' => 50000, 'description' => 'ruby yang cocok untuk para pemula', 'date' => '2020-02-22'],
            ['category_id' => 2, 'stuff_name' => 'Baju casual pria', 'started_price' => 120000, 'description' => 'baju yang cocok untuk sehari-hari', 'date' => '2020-02-22'],
            ['category_id' => 2, 'stuff_name' => 'Baju muslim pria', 'started_price' => 50000, 'description' => 'baju muslim yang dingin', 'date' => '2020-02-22'],
            ['category_id' => 2, 'stuff_name' => 'Tas Gucci', 'started_price' => 10000000, 'description' => 'tas mewah', 'date' => '2020-02-22'],
            ['category_id' => 3, 'stuff_name' => 'Hp Asus Rog', 'started_price' => 7000000, 'description' => 'hp keluaran dari asus', 'date' => '2020-02-22'],
            ['category_id' => 3, 'stuff_name' => 'Laptop MSI', 'started_price' => 15000000, 'description' => 'MSI bekas', 'date' => '2020-02-22'],
            ['category_id' => 3, 'stuff_name' => 'Kulkas 2 pintu', 'started_price' => 3000000, 'description' => 'kulkas polytron 2 pintu', 'date' => '2020-02-22'],
        ];

        foreach ($stuffs as $stuff) {
            Stuff::create($stuff);
        }
    }
}
