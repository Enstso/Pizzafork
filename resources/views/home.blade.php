@extends('layouts.app')

@section('body')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>{{ $title }}</h1>
            </div>
            <div hidden>
                {{ $user_id = Auth::id() }}
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
                    <tbody>
                        <div class="row">
                            @foreach ($pizzas as $pizza)
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <div class="card mx-auto" style="width: 18rem;">

                                        @if ($pizza->picture[0] == 'i')
                                            <img src="{{ Storage::url($pizza->picture) }}" alt="imagePizza"
                                                class="card-img-top border">
                                        @else
                                            <img src="{{ $pizza->picture }}" alt="imagePizza" class="card-img-top border">
                                        @endif
                                        <div class="card-body">


                                            <h5 class="card-title">{{ $pizza->text }}</h5>
                                            <p class="card-text">{{ $pizza->prix . ' €' }}</p>
                                            @if (isset($user_id))
                                                <a href="/panier/{{ $user_id }}/{{ $pizza->id }}"
                                                    class="btn btn-dark me-2">Au panier</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </tbody>
                </table>
                {{ $pizzas->links() }}
            </div>
        </div>
    </div>
@endsection
