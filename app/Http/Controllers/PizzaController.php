<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\PizzaRequest;
use App\Models\Pizza;
use App\Models\Garniture;
use Illuminate\Support\Facades\Storage;
class PizzaController extends Controller
{
    public function index() : View{
        $pizzas= Pizza::paginate(2);
        $titre = 'Pizzas';
        $data = ["title" => $titre, 'pizzas' => $pizzas];

        return view('pizza-index', $data);
    }

    public function create(){
        $titre = "Nouvelle Pizza";
        $data = ['title' => $titre];
        return view('pizza-form', $data);
    }

    public function edit(int $id){
        $pizzaModel = Pizza::find($id);
        $titre = "Modification Pizza";
        $data = ["title" => $titre, "pizza" => $pizzaModel];
        return view('pizza-form', $data);
    }

    public function delete($id){
        $pizza = Pizza::find($id);
        $garnitures = Garniture::where('idPizza',$id)->get();
        foreach($garnitures as $garniture){
            Garniture::destroy($garniture);
        }
        Storage::disk('public')->delete($pizza->picture);
        Pizza::destroy($id);
        return redirect()->route('pizzas')->with('info2','pizza supprimée');
    }

    public function save(PizzaRequest $request){
        $filename = time() . '.' . $request->picture->extension();
        $picture = $request->picture->storeAs("images", $filename, 'public');
        $pizzaModel = new Pizza;
        if (isset($request->id)) {
            $pizzaModel = Pizza::find($request->id);
            Storage::disk('public')->delete($pizzaModel->picture);
            $pizzaModel->text = $request->text;
            $pizzaModel->picture = $picture;
            $pizzaModel->save();
        } else {
            
            $pizzaModel->text = $request->text;
            $pizzaModel->picture = $picture;
            $pizzaModel->save();
            $pizzaModel->ingredients()->attach(config('app.id'),['order'=>config('app.order'),'quantity'=>config('app.quantity'),'idPizza'=>$pizzaModel->id]);
        }
        return redirect()->route('pizzas')->with('info','pizza enregistree');
    }
}
