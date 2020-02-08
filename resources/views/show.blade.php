@extends('layouts.app')

@section('title', "Recordatoris")

@section('content')
<p>
    <a href="{{ route('recordatori.create') }}" class="btn btn-primary">Nueva Home</a>
</p>

@if ($recordatoris->isNotEmpty())
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Hora</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recordatoris as $recordatori)
            <tr>
                <th scope="row">{{ $recordatori->id }}</th>
                <td> {{ $recordatori->name }}</td>
                <td> {{ $recordatori->hora }}</td>
            </tr>
            @endforeach
        </tbody>
    
@else
    <p>No hay Recordatorios registrados.</p>
@endif

<p>
    <a href="{{route('home')}}">Go Back</a>
</p>
@endsection