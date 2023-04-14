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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pizzas = Pizza::paginate(3);
        $title = 'Pizzas';
        $data = ["title" => $title, 'pizzas' => $pizzas];

        return view('home', $data);
    }
}
