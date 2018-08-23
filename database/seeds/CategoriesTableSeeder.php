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
          'combos materos',
          'bolsos',
          'maderas y tablas',
          'marroquineria',
          'vasos y chops',
          'set yerbera y azucarera'
        ];
        $categories = [];
        foreach ($category_names as $name) {
          factory(App\Category::class)->create(['name'=>$name]);
        }
    }
}
