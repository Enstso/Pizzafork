<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\PizzaRequest;
class PizzaController extends Controller
{
    public function index() : View{
        return view ('pizza-index');
    }

    public function create(){

    }

    public function edit(PizzaRequest $id){

    }

    public function delete($id){

    }

    public function save(PizzaRequest $id){

    }
}
