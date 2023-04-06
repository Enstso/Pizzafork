@extends('page')
@section('body')
    <div class="card">
        <div class="card-header">
            <h1>{{ $pizza->text }}</h1>
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped">

                <thead>
                    <tr>
                        <th class="col-1">Id</th>
                        <th class="col-5">Image</th>
                        <th class="col-1">Ordre</th>
                        <th class="col-1">Quantité</th>
                        <th class="col-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ingredients as $ingredient)
                        <tr>
                            <div class="row my-3 border-bottom pb-3">
                                <td class="col-1">{{ $ingredient->pivot->id }}</td>

                                @if ($ingredient->picture[0] == 'i')
                                    <td class="col-5"><img src="{{ Storage::url($ingredient->picture) }}"
                                            class="img-fluid"></td>
                                @else
                                    <td><img src="{{ $ingredient->picture }}" class="img-fluid"></td>
                                @endif

                                <td class="col-1">{{ $ingredient->pivot->order }}</td>
                                <td class="col-1">{{ $ingredient->pivot->quantity }}</td>
                                <td class="col-4">
                                    <a href="/pizza/ingredient/edit/{{ $ingredient->pivot->id }}" class="btn btn-primary"
                                        role="button">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="/pizza/ingredient/delete/{{ $ingredient->pivot->id }}" class="btn btn-danger"
                                        role="button">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                                <div>
                        </tr>
                    @empty
                        <p>La pizza n'a aucun ingrédient</p>
                </tbody>
                @endforelse
            </table>
            <a class="btn btn-primary" href="/pizzas">Voir Pizzas</a>
            <a class="btn btn-primary" href="/ingredients">Voir Ingrédients</a>
        </div>
        <a class="btn btn-primary" href="/pizza/ingredient/create/{{ $pizza->id }}"><i class="fas fa-plus"></i></a>
    </div>
@endSection
