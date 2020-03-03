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
            ['category_name' => 'Hobi', 'category_description' => 'deskripsi tentang hobi'],
            ['category_name' => 'Fashion', 'category_description' => 'deskripsi tentang fashion'],
            ['category_name' => 'Elektronik', 'category_description' => 'deskripsi tentang elektronik'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
