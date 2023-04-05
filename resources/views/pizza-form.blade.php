@extends('page')
@section('body')
    <div class="card">
        <div class="card-header">
            <h1>{{ $title }}</h1>
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="{{ isset($pizza) ? route('Pizza.save.id', ['id' => $pizza->id]) : route('Pizza.save') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class=form-group>
                    <div class="row">
                        <div class="col-12">
                            <form-label for="text ">Pizza : </form-label>
                            <input type="text" name="text"
                                id="text"value="{{ old('text', $pizza->text ?? '', false) }}"
                                placeholder="Nom de la pizza">
                        </div>
                        <div class="col-12 mt-3">
                            <form-label for="picture">Image : </form-label>
                            <input type="file" name="picture" id="picture">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">
                    <i class="fa fa-plus"> Valider</i>
                </button>
            </form>
        </div>
    </div>
@endSection
