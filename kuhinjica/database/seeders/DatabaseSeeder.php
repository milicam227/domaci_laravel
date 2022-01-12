<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();

        $cat1=\App\Models\Category::create(['name'=>"salty"]);
        $cat2=\App\Models\Category::create(['name'=>"sweet"]);
        
        $ing1=\App\Models\Ingredient::create(['name'=>"list1",'amount'=>'5']);
        $ing2=\App\Models\Ingredient::create(['name'=>"list2",'amount'=>'2']);
        $ing3=\App\Models\Ingredient::create(['name'=>"list3",'amount'=>'3']);

        
        $rec1=\App\Models\Recipe::create([
            'title'=>"cake",
            'body'=>'This is the recipe for cake',
            'category_id'=>$cat2->id,
            'ingredients_id'=>$ing1->id,
            'user_id'=>'1'
        ]);

        $rec2=\App\Models\Recipe::create([
            'title'=>"pastry",
            'body'=>'This is the recipe for pastry',
            'category_id'=>$cat1->id,
            'ingredients_id'=>$ing3->id,
            'user_id'=>'1'
        ]);
      
    }
}
