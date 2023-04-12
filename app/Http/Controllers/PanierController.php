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
         return redirect()->route('home');
    }

    public function delete(int $idPanier){
        Panier::destroy($idPanier);
        return redirect()->back()->with('info2','Pizza supprimée du panier');
    }

     public function Commander(int $idUser,int $depenseTotal){
        
        
        $pizzas = Panier::where('acheter',0)->where('idUser',$idUser)->get();
        foreach($pizzas as $pizza){
            $pizza->acheter =1;
            $pizza->date_commande = now();
            $pizza->depense_Total = $depenseTotal; 
            $pizza->save();
        }
        return redirect()->route('home')->with('info', 'Pizzas commandées');
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
        //$paniers = Panier::select('idUser','date_commande','depense_total')->distinct('idUser')->where('idUser',$idUser)->get();
        $paniers = Panier::where('idUser',$idUser)->groupBy('idUser')->get();
        $data = ['paniers'=>$paniers];
        return view('commandes',$data);
    }
}
