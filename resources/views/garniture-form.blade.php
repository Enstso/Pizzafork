@extends('page')
@section('body') 
<div class="card">
    <div class="card-header">
        @if ($titre=="Ajout d'un ingrédient dans la garniture")
        <h1>{{ $titre }}</h1> 
        @else
        <h1>{{ $titre }}</h1> 
        <h2>{{ $titre2 }}</h2> 
        @endif
        
    </div>
    <div class="card-body">
        @if ($titre=="Ajout d'un ingrédient dans la garniture")
        <form class="form-horizontal" action="/ajouter-garniture-save/{{ $pizza->id }}" method="post">
            @csrf
            <div class=form-group>
                <label for="ingredient">Ingrédient : </label>
                <select name="ingredient" id="ingredient" onChange="combo(this, 'theinput')">
                    @foreach ($ingredients as $ingredient)
                    <option value="{{$ingredient->id}}">{{ $ingredient->text }}</option>
                    @endforeach
                </select>
            </div>
            <div class=form-group>
                <form-label for="ordre ">Ordre : </form-label>
                <input type="text" name="ordre" id="ordre" value="" >
            </div>
            <div class=form-group>
                <form-label for="quantite">Quantite : </form-label>
                <input type="text" name="quantite" id="quantite" value="" >
            </div>
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-plus"> Valider</i>
            </button>
        </form>
        @else
        <form class="form-horizontal" action="/modifier-garniture/{{ $pizza->id }}/{{ $idIngredient }}" method="post">
            @csrf
            <div class=form-group>
                <form-label for="ordre ">Ordre : </form-label>
                <input type="text" name="ordre" id="ordre" value="{{ $ordre }}" >
            </div>
            <div class=form-group>
                <form-label for="quantite">Quantite : </form-label>
                <input type="text" name="quantite" id="quantite" value="{{$quantite }}" >
            </div>
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-plus"> Valider </i>
            </button>
        </form>
        @endif
    </div>
</div>

@endSection
