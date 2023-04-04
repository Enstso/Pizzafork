<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\IngredientRequest;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Storage;

class IngredientController extends Controller
{
    public function index(): view
    {
        $ingredients = Ingredient::all();
        $titre = 'Ingrédients';
        $data = ["title" => $titre, 'ingredients' => $ingredients];

        return view('ingredient-index', $data);
    }

    public function create()
    {
        $titre = "Nouvelle Ingrédient";
        $data = ['title' => $titre];
        return view('ingredient-form', $data);
    }

    public function edit(int $id)
    {
        $ingredientModel = Ingredient::find($id);
        $titre = "Modification Ingrédient";
        $data = ["title" => $titre, "ingredient" => $ingredientModel];
        return view('ingredient-form', $data);
    }

    public function delete(int $id)
    {
        $ingredient = Ingredient::find($id);
        Storage::disk('public')->delete($ingredient->picture);
        Ingredient::destroy($id);
        return redirect()->route('ingredients');
    }

    public function save(IngredientRequest $request)
    {
        $filename = time() . '.' . $request->picture->extension();
        $picture = $request->picture->storeAs("images", $filename, 'public');
        $ingredientModel = new Ingredient;
        if (isset($request->id)) {
            $ingredientModel = Ingredient::find($request->id);
            Storage::disk('public')->delete($ingredientModel->picture);
            
            $ingredientModel->text = $request->text;
            $ingredientModel->picture = $picture;
        } else {

            $ingredientModel->text = $request->text;
            $ingredientModel->picture = $picture;
        }

        $ingredientModel->save();
        return redirect()->route('ingredients');
    }
}
