<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
  
    public function run()
    {
        Category::truncate();
        
        $categories = [
          'furniture','telephony','Computing','Electronics','Tools','automotive','Utilities','bed, table and bath','home appliances','decoration'
        ];
        
        for($i = 0; $i < count($categories); $i++){
          Category::create([
            'name'=>$categories[$i]
          ]);
         }
    }
}
