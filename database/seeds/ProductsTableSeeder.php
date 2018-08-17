<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
         $categories = Category::all();
        foreach ($categories as $key=>$category) {
             // $path = $faker->image(public_path('/storage/images/products/'));
            
             // $path = strstr($path, '/storage');
            $products = factory(App\Product::class,5)
                ->create(['name'=>($category->name.' '.$key),
                          'category_id'=>$category->id]);
        }
    }
}
