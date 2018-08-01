<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\ProductImage;
class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();

         $images = [
            '/storage/images/products/1.jpg',
            '/storage/images/products/2.jpg',
        ];
        $index = 0;

        foreach ($products as $product)
        {
            ProductImage::create(['product_id'=>$product->id,
                                'url'=>$images[$index]]);

            if ($index){$index = 0;}
            else {$index = 1;}
        } 
    }
}
