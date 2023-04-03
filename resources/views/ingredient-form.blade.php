@extends('page')
@section('body')
    <div class="card">
        <div class="card-header">
            <h1>{{$title }}</h1>
        </div>
        <div class="card-body">
            <form class="form-horizontal"
                action="{{ isset($ingredient) ? route("Ingredient.save.id",["id"=>$ingredient->id]) : route("Ingredient.save") }}"
                method="post">
                @csrf
                <div class=form-group>
                    <form-label for="text ">Ingredient : </form-label>
                    <input type="text" name="text" id="text"
                        value="{{ old('text', $ingredient->text ?? '', false) }}" placeholder="Nom du nouvel ingrédient">
                </div>
                <button class="btn btn-primary" type="submit">
                    <i class="fa fa-plus"> Valider</i>
                </button>
            </form>
        </div>
    </div>
@endSection
