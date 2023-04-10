@extends('layouts.app')
@section('body')
    @if (auth()->user()->admin == 1)
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>{{ $title }}</h1>
            </div>
            <div class="card-body">
                <form class="form-horizontal"
                    action="{{ isset($garniture) ? route('Garniture.save.id', ['id' => $garniture->id]) : route('Garniture.save') }}"
                    method="post">
                    @csrf
                    <div class=form-group>
                        <label for="ingredient">Ingrédient : </label>
                        <select name="idIngredient" id="idIngredient" onChange="combo(this, 'theinput')"
                            class="form-control  @error('idIngredient') is-invalid @enderror">
                            @foreach ($ingredients as $ingredient)
                                <option value="{{ $ingredient->id }}">{{ $ingredient->text }}</option>
                            @endforeach
                        </select>
                        @error('idIngredient')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class=form-group>

                        <form-label for="order ">Ordre : </form-label>
                        <input type="text" name="order" id="order"
                            value="{{ isset($garniture) ? $garniture->order : '' }}"
                            class="form-control  @error('order') is-invalid @enderror">
                        @error('order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class=form-group>
                        <form-label for="quantity">Quantite : </form-label>
                        <input type="text" name="quantity"
                            id="quantity"value="{{ isset($garniture) ? $garniture->quantity : '' }}"class="form-control  @error('quantity') is-invalid @enderror">
                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="hidden" id="idPizza" name="idPizza" value="{{ $pizza->id }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-plus"> Valider</i>
                    </button>
                </form>
                <div class="mt-3">
                    <a href="{{ route('pizzas') }}" class="btn btn-primary">Retour</a>
                </div>
            </div>
        </div>
    </div>
    @endif
@endSection
