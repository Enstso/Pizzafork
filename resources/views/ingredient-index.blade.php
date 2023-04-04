@extends('page')
@section('body')
    <div class="card">
        <div class="card-header">
            <h1>{{$title}}</h1>
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="col-3">image</th>
                        <th scope="col" class="col-3">Ingredient</th>
                        <th scope="col" class="col-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ingredients as $ingredient)
                    <tr>
                        <th scope="row">{{$ingredient->id }}</th>
                        <td class="col-3"><img src="{{ Storage::url($ingredient->picture)}}" alt="" class="img-fluid"></td>
                        <td class="col-3">{{$ingredient->text }}</td>
                        <td class="col-3">
                            <a href="/ingredient/edit/{{$ingredient->id}}" class="btn btn-primary" role="button">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/ingredient/delete/{{$ingredient->id}}" class="btn btn-danger" role="button">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                 @endforeach 
                </tbody>
            </table>
        </div>
        <a href="/ingredient/create" class="btn btn-primary" ><i class="fas fa-plus"></i></a>
    </div>
@endSection
