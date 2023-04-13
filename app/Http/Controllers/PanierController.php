<?php

namespace App\Http\Controllers;


use Illuminate\Database\Query\IndexHint;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Panier;
use App\Models\Commande;

class PanierController extends Controller
{
    public function index(int $id): View
    {
        $user = User::find($id);
        $prixTotal = 0;
        $pizzas = $user->pizzas()->where('acheter', 0)->where('idUser', $user->id)->get();
        foreach ($pizzas as $pizza) {
            $prixTotal = $prixTotal + $pizza->prix * $pizza->pivot->quantity;
        }
        $data = ['pizzas' => $pizzas, 'user' => $user, 'prixTotal' => $prixTotal];

        return view('panier', $data);
    }

    public function auPanier(int $idUser, int $idPizza)
    {
        $panier = new Panier;
        $panier->idUser = $idUser;
        $panier->idPizza = $idPizza;
        $panier->save();
        return redirect()->route('home');
    }

    public function delete(int $idPanier)
    {
        Panier::destroy($idPanier);
        return redirect()->back()->with('info2', 'Pizza supprimée du panier');
    }

    public function Commander(int $idUser, int $depenseTotal)
    {
        $pizzas = Panier::where('acheter', 0)->where('idUser', $idUser)->get();
        $commande = new Commande;
        $commande->save();
        $commandeEnCours= Commande::all();
        $commandeEnCours= $commandeEnCours->count();
        $commande = Commande::find($commandeEnCours);
        
        foreach ($pizzas as $pizza) { 
            
            $pizza->acheter = 1;
            $pizza->idCommande = $commande->id;
            $pizza->save();
        }
        $commande->date_commande = now();
        $commande->total = $depenseTotal;
        $commande->save();
        return redirect()->route('home')->with('info', 'Pizzas commandées');
    }

    public function Commande(int $idUser, $idPanier): View
    {
        $user = User::find($idUser);
        $depensesTotal = 0;
        $pizzas = $user->pizzas()->where('acheter', 1)->where('idUser', $user->id)->where('idPanier', $idPanier)->get();
        foreach ($pizzas as $pizza) {
            $depensesTotal = $depensesTotal + $pizza->prix;
        }
        $data = ['pizzas' => $pizzas, 'user' => $user, 'depensesTotal' => $depensesTotal];

        return view('commande', $data);
    }

    public function Commandes(int $idUser): View
    {
        $paniers = User::find($idUser);
        $paniers = $paniers->commandes()->get();
        //$paniers = Panier::select('idUser','date_commande','depense_total')->distinct('idUser')->where('idUser',$idUser)->get();
        //$paniers = Panier::where('idUser', $idUser)->groupBy('idUser')->get();
        //$paniers = Commande::find
        $data = ['paniers' => $paniers];
        return view('commandes', $data);
    }

    public function Plus(int $idPanier)
    {
        $panier = Panier::where('id', $idPanier)->first();
        $panier->quantity = $panier->quantity + 1;
        $panier->save();
        return redirect()->back();
    }

    public function Moins(int $idPanier)
    {
        $panier = Panier::where('id', $idPanier)->first();
        if ($panier->quantity == 1) {
            return redirect()->back()->with('info2', 'supprimer votre pizza');
        } else {
            $panier->quantity = $panier->quantity - 1;
        }
        $panier->save();
        return redirect()->back();
    }
}
