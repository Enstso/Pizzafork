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
                    action="{{ isset($pizza) ? route('Pizza.save.id', ['id' => $pizza->id]) : route('Pizza.save') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <div class=form-group>
                        <div class="row">
                            <div class="col-12">
                                <form-label for="text ">Pizza : </form-label>
                                <input type="text" name="text"
                                    id="text"value="{{ old('text', $pizza->text ?? '', false) }}"
                                    placeholder="Nom de la pizza" class="form-control  @error('text') is-invalid @enderror">
                                @error('text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mt-3">
                                <form-label for="picture">Image : </form-label>
                                <input type="file" name="picture" id="picture"
                                    class="form-control  @error('picture') is-invalid @enderror">
                                @error('picture')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mt-3">
                                <form-label for="picture">Prix : </form-label>
                                <input type="number" step="0.01" name="prix" id="prix" value="{{ old('prix', $pizza->prix ?? '', false) }}"
                                    class="form-control  @error('prix') is-invalid @enderror">
                                @error('prix')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-plus"> Valider</i>
                    </button>
                </form>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('pizzas') }}" class="btn btn-primary">Retour</a>
        </div>
    </div>
    @endif
@endSection
