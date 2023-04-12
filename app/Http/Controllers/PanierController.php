<?php

namespace App\Http\Controllers;


use Illuminate\Database\Query\IndexHint;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Panier;
class PanierController extends Controller
{
    public function index(int $id) : View {
        $user = User::find($id);
        $prixTotal=0;
        $pizzas = $user->pizzas()->where('acheter',0)->where('idUser',$user->id)->get();
        foreach($pizzas as $pizza){
            $prixTotal = $prixTotal+$pizza->prix;
        }
        $data = ['pizzas' => $pizzas,'user'=>$user,'prixTotal'=>$prixTotal];

        return view('panier',$data);
    }

    public function auPanier (int $idUser, int $idPizza) {
         $panier = new Panier;
         $panier->idUser = $idUser;
         $panier->idPizza = $idPizza;
         $panier->save();
    }

    public function delete(int $idPanier){
        Panier::destroy($idPanier);
    }

     public function Commander(int $idUser){
        $user = User::find($idUser);
        $pizzas = $user->pizzas()->where('acheter',0)->where('idUser',$user->id)->get();
        foreach($pizzas as $pizza){
            $pizza->acheter =1;
            $pizza->date_commande = now();
            $pizza->save();
        }

     }

    public function Commande(int $idUser, $idPanier) : View {
        $user = User::find($idUser);
        $depensesTotal=0;
        $pizzas = $user->pizzas()->where('acheter',1)->where('idUser',$user->id)->where('idPanier',$idPanier)->get();
        //$pizzas = $user->pizzas()->where('acheter',1)->where('idPanier',$idPanier)->get();
        foreach($pizzas as $pizza){
            $depensesTotal = $depensesTotal+$pizza->prix;
        }
        $data = ['pizzas' => $pizzas,'user'=>$user,'depensesTotal'=>$depensesTotal];

        return view('commande',$data);
    }

    public function Commandes (int $idUser) : View{
        $paniers = Panier::where('idUser',$idUser)->distinct()->get();
        $data = ['paniers'=>$paniers];
        return view('commandes',$data);
    }
}
