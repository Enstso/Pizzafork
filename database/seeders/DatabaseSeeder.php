<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ingredient;
use App\Models\Pizza;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::all();
        if ($users->count() == 0) {
            DB::table('users')->insert([

                "name" => 'administrator',
                "email" => 'admin@outlook.fr',
                "password" => '$2y$10$KQD71wKhhl8K3OwUSPlav.WWqqmFi5xgAOTQ56ApgOzwH02AAo6da',
                "admin" => 1,
                "email_verified_at" => now(),
                "created_at" => now(),
            ]);

            DB::table('users')->insert([

                "name" => 'chef',
                "email" => 'chef@outlook.fr',
                "password" => '$2y$10$KQD71wKhhl8K3OwUSPlav.WWqqmFi5xgAOTQ56ApgOzwH02AAo6da',
                "chef"  =>1,
                "email_verified_at" => now(),
                "created_at" => now(),
            ]);
        }
        //Ingredient::factory(2)->create();
        Ingredient::create(['text' => config('app.nom'), 'picture' => config('app.picture')]);
        Pizza::factory(3)->create();
        $count = Pizza::all();
        $i = 1;
        if ($count->count() > 3) {
            $i = $count->count() - 1;
        }

        for ($i; $i <= $count->count(); $i++) {
            DB::table('garnitures')->insert([

                "idIngredient" => config('app.id'),
                "order" => config('app.order'),
                "quantity" => config('app.quantity'),
                "idPizza" => $i
            ]);
        }
    }
}
