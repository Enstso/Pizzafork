<?php

namespace App\Http\Controllers;
use App\Models\Pizza;
use Illuminate\Http\Request;

class HomeauthController extends Controller
{
    public function index()
    {
        $pizzas= Pizza::paginate(2);
        $title = 'Pizzas';
        $data = ["title" => $title, 'pizzas' => $pizzas];

        return view('accueil',$data);
        
    }
}
