<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        Product::truncate();
        $faker = Faker::create();
        $contCaretory = 1;
      
        for($i = 0; $i < 100; $i++){
          
          if($contCaretory == 11){
            $contCaretory = 1;
          }
          
           Product::create([
            'name'=>$faker->word,
            'imagePath'=>"img/generic_img_product/image_2.png",
            'price'=>mt_rand(500,2000),
            'quantity'=>rand(10, 100),
            'weight'=> mt_rand(10, 30),
            'height'=> mt_rand(10, 30),
            'width'=> mt_rand(10, 30),
            'length'=>mt_rand(10, 30),
            'diameter'=> mt_rand(0, 10),
            'description'=>$faker->text,
            'id_category'=>$contCaretory
          ]);
          $contCaretory++;
        }
    }
}
