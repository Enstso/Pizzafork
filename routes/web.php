<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GarnitureController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\PizzaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pizzas',[PizzaController::class,'index'])->name('pizzas');
Route::get('/pizza/create',[PizzaController::class,'create']);
Route::get('/pizza/edit/{id}',[PizzaController::class,'edit'])->where('id','[0-9]+');
Route::get('/pizza/delete/{id}',[PizzaController::class,'delete'])->where('id','[0-9]+');
Route::post('/pizza/save',[PizzaController::class,'save'])->name('Pizza.save');
Route::post('/pizza/save/{id}',[PizzaController::class,'save'])->where('id','[0-9]+')->name('Pizza.save.id');

Route::get('/ingredients',[IngredientController::class,'index'])->name('ingredients');
Route::get('/ingredient/create',[IngredientController::class,'create']);
Route::get('/ingredient/edit/{id}',[IngredientController::class,'edit'])->where('id','[0-9]+');
Route::get('/ingredient/delete/{id}',[IngredientController::class,'delete'])->where('id','[0-9]+');
Route::post('/ingredient/save',[IngredientController::class,'save'])->name('Ingredient.save');
Route::post('/ingredient/save/{id}',[IngredientController::class,'save'])->where('id','[0-9]+')->name('Ingredient.save.id');

Route::get('/pizza/ingredients/{id}',[GarnitureController::class,'index'])->where('id','[0-9]+')->name('garnitures');
Route::get('/pizza/ingredient/create/{id}',[GarnitureController::class,'create'])->where('id','[0-9]');
Route::get('/pizza/ingredient/edit/{id}',[GarnitureController::class,'edit'])->where('id','[0-9]');
Route::get('pizza/ingredient/delete/{id}',[GarnitureController::class,'delete'])->where('id','[0-9]');
Route::post('/pizza/ingredient/save',[GarnitureController::class,'save'])->name('Garniture.save');
Route::post('/pizza/ingredient/save/{id}',[GarnitureController::class,'save'])->where('id','[0-9]+')->name('Garniture.save.id');

