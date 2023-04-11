@extends('layouts.app')

@section('body')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>{{ $title }}</h1>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="col-3">Pizza</th>
                            <th scope="col" class="col-3">description</th>
                            <th scope="col" class="col-3">prix</th>
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
                                    <td class="col-3"><img src="{{ $pizza->picture }}" alt="" class="img-fluid">
                                    </td>
                                @endif
                                <td class="col-3">{{ $pizza->text }}</td>
                                <td class="col-3">{{$pizza->prix .' €' }}</td>

                                <td><a href="{{}}" class="btn btn-dark me-2">Au panier</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pizzas->links() }}
            </div>
        </div>
    </div>
@endsection
