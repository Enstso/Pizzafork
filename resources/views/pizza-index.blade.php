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
                        <th scope="col" class="col-3">Pizza</th>
                        <th scope="col" class="col-3">description</th>
                        <th scope="col" class="col-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pizzas as $pizza)
                        <tr>
                            <th scope="row">{{ $pizza->id }}</th>
                            @if ($pizza->picture[0] == 'i')
                                <td class="col-3"><img src="{{ Storage::url($pizza->picture) }}" alt=""
                                        class="img-fluid"></td>
                            @else
                                <td class="col-3"><img src="{{ $pizza->picture }}" alt="" class="img-fluid"></td>
                            @endif
                            <td class="col-3">{{ $pizza->text }}</td>
                            <td class="col-3">
                                <a href="/pizza/edit/{{ $pizza->id }}" class="btn btn-primary" role="button">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="/pizza/ingredients/{{ $pizza->id }}" class="btn btn-secondary" role="button">
                                    <i class="fas fa-list-ul"></i>
                                </a>
                                <a href="/pizza/delete/{{ $pizza->id }}" class="btn btn-danger" role="button">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $pizzas->links() }}
        </div>
        <a class="btn btn-primary" href="/pizza/create"><i class="fas fa-plus"></i></a>
    </div>
@endSection
