<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\IndexHint;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
class PanierController extends Controller
{
    public function index(int $id) : View {
        $user = User::find($id);
        $prixTotal=0;
        $pizzas = $user->pizzas()->where('acheter',0)->where('idUser',$id)->get();
        foreach($pizzas as $pizza){
            $prixTotal = $prixTotal+$pizza->prix;
        }
        $data = ['pizzas' => $pizzas,'user'=>$user,'prixTotal'=>$prixTotal];

        return view('panier',$data);
    }

    public function Commande(int $id) : View {
        $user = User::find($id);
        $depensesTotal=0;
        $pizzas = $user->pizzas()->where('acheter',1)->where('idUser',$id)->get();
        foreach($pizzas as $pizza){
            $depensesTotal = $depensesTotal+$pizza->prix;
        }
        $data = ['pizzas' => $pizzas,'user'=>$user,'depensesTotal'=>$depensesTotal];

        return view('commande',$data);
    }
}
