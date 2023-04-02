<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\GarnitureRequest;
class GarnitureController extends Controller

{
    public function index() : view{
        return view('garniture-index');
    }

    public function create(){

    }

    public function edit(GarnitureRequest $id){

    }

    public function delete(int $id){

    }

    public function save(GarnitureRequest $id=null){

    }
}
