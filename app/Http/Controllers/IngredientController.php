<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\IngredientRequest;
class IngredientController extends Controller
{
    public function index() :view{
        return view ('ingredinet-index');
    }

    public function create(IngredientRequest $id){

    }

    public function edit(IngredientRequest $id){

    }

    public function delete(int $id){

    }

    public function save(IngredientRequest $id = null){

    }
}
