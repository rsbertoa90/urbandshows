<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $category_names =
        [
          'mates',
          'sets',
          'termos',
          'bolsos',
        ];
        $categories = [];
        foreach ($category_names as $name) {
          $category = new Category();
          $category->name = $name;
          $category->save();
        }
    }
}
