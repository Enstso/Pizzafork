@extends('page')
@section('body')
    <div class="card">
        <div class="card-header">
            <h1>{{ $title }}</h1>
        </div>
        <div class="card-body">
            @if (session('info'))
                <div class="alert alert-success" role="alert">
                    {{ session('info') }}
                </div>
            @endif
            @if (session('info2'))
                <div class="alert alert-danger" role="alert">
                    {{ session('info2') }}
                </div>
            @endif
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="col-3">image</th>
                        <th scope="col" class="col-3">description</th>
                        <th scope="col" class="col-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ingredients as $ingredient)
                        <tr>
                            <th scope="row">{{ $ingredient->id }}</th>
                            @if ($ingredient->picture[0] == 'i')
                                <td class="col-3"><img src="{{ Storage::url($ingredient->picture) }}" alt=""
                                        class="img-fluid"></td>
                            @else
                                <td class="col-3"><img src="{{ $ingredient->picture }}" alt="" class="img-fluid">
                                </td>
                            @endif
                            <td class="col-3">{{ $ingredient->text }}</td>
                            <td class="col-3">
                                <a href="/ingredient/edit/{{ $ingredient->id }}" class="btn btn-primary" role="button">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="/ingredient/delete/{{ $ingredient->id }}" class="btn btn-danger" role="button">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $ingredients->links() }}
        </div>
        <a href="/ingredient/create" class="btn btn-primary"><i class="fas fa-plus"></i></a>
    </div>
    <div class="mt-3">
        <a href="{{route('pizzas')}}" class="btn btn-primary">Voir les pizzas</a>
        </div>
@endSection
