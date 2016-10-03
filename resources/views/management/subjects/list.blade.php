@extends('management.layout')

@section('title')
    Lista de Materias
@endsection

@section('content')
    <div class="row">
        <h2>Materias:</h2>
        <ul>
            @foreach($subjects as $subject)
                <li>
                    {{$subject->name}}
                </li>
            @endforeach
        </ul>
        <a href="{{route('subjects.create')}}" class="btn btn-primary">Crear Materia </a>
    </div>
@endsection