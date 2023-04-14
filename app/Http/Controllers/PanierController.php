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
        $validation  = 1;
        $panierEnCours = Panier::where('idUser', $idUser)->where('acheter', 0)->get();
        foreach ($panierEnCours as $panier) {
            if ($panier->idPizza == $idPizza) {
                $this->Plus($panier->id);
                $validation = 0;
            }
        }
        if ($validation == 1) {
            $panier = new Panier;
            $panier->idUser = $idUser;
            $panier->idPizza = $idPizza;
            $panier->save();
            return redirect()->route('home');
        }
        return redirect()->back();
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
        $commande->idUser = $idUser;
        $commande->save();
        $commandeEnCours = Commande::all();
        $commandeEnCours = $commandeEnCours->count();
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

    public function Commande(int $idUser, $idCommande): View
    {
        $commande = Commande::find($idCommande);
        $user = User::find($idUser);
        $depensesTotal = 0;
        $pizzas = $commande->pizzas()->get();
        $depensesTotal = $commande->total;
        $data = ['pizzas' => $pizzas, 'commande' => $commande, 'depensesTotal' => $depensesTotal];
        return view('commande', $data);
    }

    public function Commandes(int $idUser): View
    {
        $user = User::find($idUser);
        $commandes = $user->commandes()->where('idUser', $idUser)->get();
        $data = ['commandes' => $commandes];
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
