@extends('management.layout')

@section('title')
    Alta de Materia
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-5 col-xs-offset-3">
            {!! Form::open(['route' => 'subjects.store', 'method' => 'post']) !!}
                <div class="form-group row">
                    <label for="example-text-input" class="col-xs-2 col-form-label">Nombre</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="Nombre"  name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-xs-2 col-form-label">Descripción</label>
                    <div class="col-xs-10">
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <button class="btn btn-primary" type="submit" >
                        Enviar
                    </button>
                </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection