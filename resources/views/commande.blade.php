@extends('layouts.app')
@section('body')
    <div class="container">
        <h1 class="text-dark mt-120">La Commande du {{ $commande->date_commande }}</h1>
        @foreach ($pizzas as $pizza)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div>
                                @if ($pizza->picture[0] == 'i')
                                    <img src="{{ Storage::url($pizza->picture) }}"class="img-fluid rounded-3"
                                        alt="Shopping item" style="width: 65px;">
                                @else
                                    <img src="{{ $pizza->picture }}"class="img-fluid rounded-3" alt="Shopping item"
                                        style="width: 65px;">
                                @endif
                            </div>
                            <div class="ms-3">
                                <h5>{{ $pizza->text }}</h5>
                                
                            </div>
                            <div class="ms-5">
                            <h5 class="text-center"> qte : {{$pizza->pivot->quantity}}</h5>
                        </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <div style="width: 80px;">
                                <h5 class="mb-0">{{ $pizza->pivot->quantity * $pizza->prix . ' €' }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <p>Dépenses total : {{ $depensesTotal }}</p>
    </div>
@endsection