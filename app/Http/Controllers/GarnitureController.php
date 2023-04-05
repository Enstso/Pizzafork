<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\GarnitureRequest;
use App\Models\Garniture;
use Illuminate\Support\Facades\Storage;
class GarnitureController extends Controller

{
    public function index() : view{
        $Garnitures = Garniture::all();
        $titre = 'Garnitures';
        $data = ["title" => $titre, 'ingredients' => $Garnitures];
        $Garnitures= Garniture::oldest('text')->paginate(5);
        return view('garniture-index',$data);
    }

    public function create(){
        $titre = "Nouvelle Garniture";
        $data = ['title' => $titre];
        return view('garniture-form', $data);
    }

    public function edit($id){
        $garnitureModel = Garniture::find($id);
        $titre = "Modification Ingrédient";
        $data = ["title" => $titre, "ingredient" => $garnitureModel];
        return view('garniture-form', $data)->with('info','Ganiture modifiée');
    }

    public function delete(int $id){
        $garniture = Garniture::find($id);
        Storage::disk('public')->delete($garniture->picture);
        Garniture::destroy($id);
        return redirect()->route('garnitures')->with('info2','Ganiture supprimée');
    }

    public function save(GarnitureRequest $request){

        $filename = time() . '.' . $request->picture->extension();
        $picture = $request->picture->storeAs("images", $filename, 'public');
        $garnitureModel = new Garniture;
        if (isset($request->id)) {
            $garnitureModel = Garniture::find($request->id);
            Storage::disk('public')->delete($garnitureModel->picture);
            
            $garnitureModel->text = $request->text;
            $garnitureModel->picture = $picture;
        } else {

            $garnitureModel->text = $request->text;
            $garnitureModel->picture = $picture;
        }

        $garnitureModel->save();
        return redirect()->route('ingredients')->with('info','Ganiture sauvegadée');
    }
}
