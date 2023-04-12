<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Panier', function (Blueprint $table) {
            $table->id();
            $table->boolean('acheter')->default(0);
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idPizza');
            $table->decimal('depense_total',9,2)->nullable(true);
            $table->timestamp('date_commande')->nullable(true);
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idPizza')->references('id')->on('Pizzas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Panier');
    }
};
