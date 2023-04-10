<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Garnitures',function(Blueprint $table){

            $table->id('id');
            $table->integer('order',false,true);
            $table->integer('quantity',false,true);
            $table->unsignedBigInteger('idIngredient');
            $table->unsignedBigInteger('idPizza');
            $table->foreign('idIngredient')->references('id')->on('Ingredients')->onDelete('cascade');
            $table->foreign('idPizza')->references('id')->on('Pizzas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Garniture');
    }
};

