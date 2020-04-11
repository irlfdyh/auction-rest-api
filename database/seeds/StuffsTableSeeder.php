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
            [
                'category_id' => 1, 
                'officer_id' => 1,
                'stuff_name' => 'Fidget Spinner', 
                'started_price' => 20000, 
                'description' => 'fidget spinner viral beberapa tahun ke belakang', 
                'image_url' => 'https://i.ebayimg.com/images/g/ykEAAOSww9xZLY5~/s-l500.jpg', 
                'status' => 'disimpan', 
                'date' => '2020-02-22'
            ],
            [
                'category_id' => 1,
                'officer_id' => 2, 
                'stuff_name' => 'Gitar Akustik', 
                'started_price' => 1000000, 
                'description' => 'gitar akustik dari kayu mahony', 
                'image_url' => 'https://i.ebayimg.com/images/g/wEUAAOSwfpBaZE~b/s-l1600.jpg', 
                'status' => 'disimpan', 
                'date' => '2020-02-22'],
            [
                'category_id' => 1,
                'officer_id' => 3, 
                'stuff_name' => 'Ruby Segi 4', 
                'started_price' => 50000, 
                'description' => 'ruby yang cocok untuk para pemula', 
                'image_url' => 'https://i.ebayimg.com/images/g/bKYAAOSwW4dc6qYt/s-l400.jpg', 
                'status' => 'disimpan', 
                'date' => '2020-02-22'],
            [
                'category_id' => 2,
                'officer_id' => 4, 
                'stuff_name' => 'Baju casual pria', 
                'started_price' => 120000, 
                'description' => 'baju yang cocok untuk sehari-hari', 
                'image_url' => 'https://i.ebayimg.com/images/g/8a4AAOSwQEtebtgZ/s-l1600.jpg', 
                'status' => 'disimpan', 
                'date' => '2020-02-22'],
            [
                'category_id' => 2,
                'officer_id' => 1, 
                'stuff_name' => 'Baju muslim pria', 
                'started_price' => 50000, 
                'description' => 'baju muslim yang dingin', 
                'image_url' => 'https://i.ebayimg.com/images/g/s2MAAOSwj-5du4dv/s-l400.jpg', 
                'status' => 'disimpan', 
                'date' => '2020-02-22'],
            [
                'category_id' => 2,
                'officer_id' => 2, 
                'stuff_name' => 'Tas Gucci', 
                'started_price' => 10000000, 
                'description' => 'tas mewah', 
                'image_url' => 'https://i.ebayimg.com/images/g/lh4AAOSwduVeXwzm/s-l400.jpg', 
                'status' => 'disimpan', 
                'date' => '2020-02-22'],
            [
                'category_id' => 3,
                'officer_id' => 3, 
                'stuff_name' => 'Laptop Asus Rog', 
                'started_price' => 7000000, 
                'description' => 'hp keluaran dari asus', 
                'image_url' => 'https://i.ebayimg.com/images/g/W0EAAOSwiplef6w-/s-l400.jpg', 
                'status' => 'disimpan', 
                'date' => '2020-02-22'],
            [
                'category_id' => 3,
                'officer_id' => 4, 
                'stuff_name' => 'Laptop MSI', 
                'started_price' => 15000000, 
                'description' => 'MSI bekas', 
                'image_url' => 'https://i.ebayimg.com/images/g/bjAAAOSwlr1d6JAS/s-l400.jpg', 
                'status' => 'disimpan', 
                'date' => '2020-02-22'],
            [
                'category_id' => 3,
                'officer_id' => 1, 
                'stuff_name' => 'Kulkas 2 pintu', 
                'started_price' => 3000000, 
                'description' => 'kulkas polytron 2 pintu', 
                'image_url' => 'https://i.ebayimg.com/images/g/6fAAAOSw2T9ejzfg/s-l400.jpg', 
                'status' => 'disimpan', 
                'date' => '2020-02-22'],
        ];

        foreach ($stuffs as $stuff) {
            Stuff::create($stuff);
        }
    }
}
