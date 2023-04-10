<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\GarnitureRequest;
use App\Models\Garniture;
use App\Models\Ingredient;
use App\Models\Pizza;
use Illuminate\Support\Facades\Storage;
class GarnitureController extends Controller

{
    public function index(int $id) : view{
        $Pizza = Pizza::find($id);
        $ingredients = $Pizza->ingredients()->orderBy('order')->get();

        $data = ['ingredients' => $ingredients,'pizza'=>$Pizza];

        return view('garniture-index',$data);
    }

    public function create(int $id){
        $ingredients=Ingredient::all();
        $pizza = Pizza::find($id);
        $titre = "Nouvelle Ingrédient de la garniture";
        $data = ['title' => $titre,'pizza'=>$pizza ,'ingredients'=>$ingredients];
        return view('garniture-form', $data);
    }

    public function edit(int $id){
        $garniture = Garniture::find($id);
        $Pizza = Pizza::find($garniture->idPizza);
        $ingredients=Ingredient::all();
        $titre = "Modification Ingrédient de la garniture";
        $data = ["title" => $titre, "ingredients" => $ingredients, 'pizza'=>$Pizza, "garniture"=>$garniture] ;
        return view('garniture-form', $data)->with('info','Ganiture modifiée');
    }

    public function delete(int $id){
        Garniture::destroy($id);
        return redirect()->route('pizzas')->with('info2','Ganiture supprimée');
    }

    public function save(GarnitureRequest $request){

       
        $garnitureModel = new Garniture;
        if (isset($request->id)) {
            $garnitureModel = Garniture::find($request->id);
            $garnitureModel->order = $request->order;
            $garnitureModel->quantity = $request->quantity;
            $garnitureModel->idIngredient= $request->idIngredient;
            $garnitureModel->idPizza = $request->idPizza;
        } else {

            $garnitureModel->order = $request->order;
            $garnitureModel->quantity = $request->quantity;
            $garnitureModel->idIngredient= $request->idIngredient;
            $garnitureModel->idPizza = $request->idPizza;
        }

        $garnitureModel->save();
        return redirect()->route('pizzas')->with('info','Ganiture sauvegadée');
    }
}

