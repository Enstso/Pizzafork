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
                    <th class="col-3">Image</th>
                    <th class="col-3">Ordre</th>
                    <th class="col-3">Quantité</th>
                    <th class="col-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ingredients as $ingredient)
                    <tr>
                        <th scope="row my-3 border-bottom pb-3">
                            @if ($ingredient->picture[0] == 'i')
                                <img src="{{ Storage::url($ingredient->picture) }}" class="img-fluid">
                            @else
                                <img src="{{ $ingredient->picture }}" class="img-fluid">
                            @endif
                        </th>
                        <td>{{ $ingredient->pivot->order }}</td>
                        <td>{{ $ingredient->pivot->quantity }}</td>
                        <td>
                            <a href="/pizza/ingredient/edit/{{ $pizza->id }}"
                                class="btn btn-primary" role="button">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/pizza/ingredient/delete/{{ $pizza->id }}"
                                class="btn btn-danger" role="button">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>

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
