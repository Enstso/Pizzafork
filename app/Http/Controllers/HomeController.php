<?php

namespace App\Http\Controllers;
use App\Models\Pizza;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pizzas= Pizza::paginate(2);
        $title = 'Pizzas';
        $data = ["title" => $title, 'pizzas' => $pizzas];

        return view('home',$data);
    }

    public function redirect()
    {
        redirect()->route('home');
    }

    public function accueil()
    {
        $pizzas= Pizza::paginate(2);
        $title = 'Pizzas';
        $data = ["title" => $title, 'pizzas' => $pizzas];

        return view('accueil',$data);
    }
}
