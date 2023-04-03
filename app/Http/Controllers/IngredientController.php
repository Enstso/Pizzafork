<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\IngredientRequest;
use App\Models\Ingredient;
class IngredientController extends Controller
{
    public function index() :view{
       $ingredients = Ingredient::all();
       $titre = 'Ingrédients';
       $data=["title"=>$titre,'ingredients'=>$ingredients];
       
        return view ('ingredient-index',$data);
    }

    public function create(){
        $titre ="Nouvelle Ingrédient";
        $data=['title'=>$titre];
        return view('ingredient-form',$data);
    }

    public function edit(IngredientRequest $request){

        
        $ingredientModel = Ingredient::find($request->id);
        $titre = "Modification Ingrédient";
        $data=["titre"=>$titre,"ingredient"=>$ingredientModel];
        return view('ingredient-form',$data);
    }

    public function delete(int $id){
        Ingredient::find($id)->delete();
        return redirect()->route('ingredients');
    }

    public function save(IngredientRequest $request ){
        $ingredientModel = new Ingredient;
        if(isset($request->id)){
            $ingredientModel->id = $request->id;
            $ingredientModel->text = $request->text;
            $ingredientModel->picture = $request->picture;
        }
        else{
            $ingredientModel->text = $request->text;
            $ingredientModel->picture = $request->picture;
        }

        $ingredientModel->save();
        return redirect()->route('ingredients');
    }
}
