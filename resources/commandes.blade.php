@extends('layouts.app')
@section('body')
    <div class="container">
        <h1 class="text-dark mt-120">Vos Commandes</h1>
        @foreach ($paniers as $panier)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div>

                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJvepPlDToNEmxLAwZ1LK5p82JxLwO9900Cw&usqp=CAU"class="img-fluid rounded-3"
                                    alt="Shopping item" style="width: 65px;">

                            </div>
                            <div class="ms-3">
                                <h5>Pizzas du {{ $panier->date }}</h5>
                                <a href="/commande/{{Auth::user()->id }}/{{$panier->id}}" class="small mb-0">ma commande</a>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <div style="width: 80px;">
                                <h5 class="mb-0">{{ $panier->quantity * $panier->prix. ' €' }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
