@extends('layouts.app')
@section('body')
    <div class="container">
        <h1 class="text-dark ">Panier</h1>
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
        @foreach ($pizzas as $pizza)
            <div class="card mb-3 ">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div>
                                @if ($pizza->picture[0] == 'i')
                                    <img src="{{ Storage::url($pizza->picture) }}"class="img-fluid rounded-3"
                                        style="width: 65px;" alt="">
                                @else
                                    <img src="{{ $pizza->picture }}" class="img-fluid rounded-3" style="width: 65px;"
                                        alt="">
                                @endif
                            </div>

                            <div class="ms-3">

                                <h5>{{ $pizza->text }}</h5>

                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <div style="width: 80px;">
                                <h5 class="mb-0">{{ $pizza->prix }} €</h5>
                            </div>
                            <a href="/delete/{{ $pizza->pivot->id }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <a href="/commander/{{ Auth::id() }}/{{$prixTotal}}" class="btn btn-dark me-2">Commander</a>

        <p class="mt-3">Prix total {{ $prixTotal . ' €' }}</p>
    </div>
@endSection
