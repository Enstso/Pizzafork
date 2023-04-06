<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ingredient;
use App\Models\Pizza;
use Illuminate\Support\Facades\DB;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Ingredient::factory(10)->create();
        Pizza::factory(10)->create();
        $count = Pizza::all();
        $i=1;
        if($count->count()>10){
            $i = $count->count() - 9 ;
        }

        for($i;$i<=$count->count();$i++){
            DB::table('garnitures')->insert([
                
                "idIngredient"=>$i,
                "order"=>$i,
                "quantity"=>$i,
                "idPizza"=>$i
            ]);
        }
    }
}
