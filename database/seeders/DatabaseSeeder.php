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
        //Ingredient::factory(2)->create();
        Ingredient::create(['text'=>config('app.nom'),'picture'=>config('app.picture')]);
        Pizza::factory(2)->create();
        $count = Pizza::all();
        $i=1;
        if($count->count()>2){
            $i = $count->count() - 1 ;
        }

        for($i;$i<=$count->count();$i++){
            DB::table('garnitures')->insert([
                
                "idIngredient"=>config('app.id'),
                "order"=>config('app.order'),
                "quantity"=>config('app.quantity'),
                "idPizza"=>$i
            ]);
        }
    }
}
