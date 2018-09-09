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
          'combos materos',
          'portatermos y carteras',
          'set yerbera y azucarera',
          'termos',
          'bombillas',
          'marroquineria',
          'maderas y tablas',
          'billeteras',
          'vasos y chops',
        ];
        $categories = [];
        foreach ($category_names as $name) {
          factory(App\Category::class)->create(['name'=>$name]);
        }
    }
}
