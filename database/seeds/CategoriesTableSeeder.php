<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['category_name' => 'Hobi', 'category_description' => 'deskripsi tentang hobi', 'image_url' => 'https://i.ebayimg.com/images/g/oGcAAOSwz~pZ9b9p/s-l1600.jpg'],
            ['category_name' => 'Fashion', 'category_description' => 'deskripsi tentang fashion', 'image_url' => 'https://i.ebayimg.com/images/g/HrAAAOSwFC1daRBv/s-l1600.jpg'],
            ['category_name' => 'Elektronik', 'category_description' => 'deskripsi tentang elektronik', 'image_url' => 'https://i.ebayimg.com/images/g/rfYAAOSw7xtePuDC/s-l1600.jpg'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
