@extends('page')
@section('body')
    <div class="card">
        <div class="card-header">
            <h1>{{ $title }}</h1>
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="{{ isset($ingredient) ? route('Ingredient.save.id', ['id' => $ingredient->id]) : route('Ingredient.save') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class=form-group>
                    <div class="row">
                        <div class="col-12">
                            <form-label for="text ">Ingredient : </form-label>
                            <input type="text" name="text"
                                id="text"value="{{ old('text', $ingredient->text ?? '', false) }}"
                                placeholder="Nom du nouvel ingrédient">
                        </div>
                        <div class="col-12 mt-3">
                            <form-label for="picture">Image : </form-label>
                            <input type="file" name="picture" id="picture">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">
                    <i class="fa fa-plus"> Valider</i>
                </button>
            </form>
        </div>
    </div>
@endSection
