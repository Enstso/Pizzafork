@extends('page')
@section('body')
    <div class="card">
        <div class="card-header">
            <h1>
                {{ $title }}
            </h1>
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="{{ isset($pizza) ? route("Pizza.save.id",["id"=>$pizza->id]) : route(Pizza.save) }}"
                method="post">
                @csrf
                <div class=form-group>
                    <form-label for="text ">Pizza : </form-label>
                    <input type="text" name="text" id="text" value="<?= old('text', $pizza->text ?? '', false) ?>"
                        placeholder="Nom de la pizza">
                </div>
                <button class="btn btn-primary" type="submit">
                    <i class="fa fa-plus"> Valider</i>
                </button>
            </form>
        </div>
    </div>
@endSection
