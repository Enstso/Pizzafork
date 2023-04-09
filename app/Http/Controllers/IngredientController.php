<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\IngredientRequest;
use App\Models\Ingredient;
use App\Models\Garniture;
use Illuminate\Support\Facades\Storage;

class IngredientController extends Controller
{
    public function index(): view
    {
        $ingredients = Ingredient::paginate(2);
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
        $garnitures = Garniture::where('idIngredient', $id)->get();
        if ($garnitures->count() != 0) {
            return redirect()->route('ingredients')->with('info2', 'Ingrédient utilisé dans une pizza');
        } else {
            $ingredient = Ingredient::find($id);
            Storage::disk('public')->delete($ingredient->picture);
            Ingredient::destroy($id);
            return redirect()->route('ingredients')->with('info2', 'ingrédient supprimée');
        }
    }

    public function save(IngredientRequest $request)
    {
        $ingredients = Ingredient::all();
        $filename = time() . '.' . $request->picture->extension();
        $picture = $request->picture->storeAs("images", $filename, 'public');
        $ingredientModel = new Ingredient;
        if (isset($request->id)) {
            if ($request->id != 1) {
                $ingredientModel = Ingredient::find($request->id);
                Storage::disk('public')->delete($ingredientModel->picture);
                $ingredientModel->text = $request->text;
                $ingredientModel->picture = $picture;
            } 
            else {
                return redirect()->route('ingredients')->with('info2', 'Vous ne pouvez pas modifier la pâte à pizza');
            }
        } else {
            if ($ingredients->count() == 0) {
                $ingredientModel->text = config('app.nom');
                $ingredientModel->picture = config('app.picture');
                $ingredientModel->save();
                $ingredientModel = $request->text;
                $ingredientModel = $request->picture;
            } else {
                $ingredientModel->text = $request->text;
                $ingredientModel->picture = $picture;
            }
        }

        $ingredientModel->save();
        return redirect()->route('ingredients')->with('info', 'ingrédient enregistrée');
    }
}
