@extends('layouts.app')

@section('title', "Recordatoris")

@section('content')
<p>
    <a href="{{route('home')}}" class="btn btn-secondary">Go Back</a>
    <a href="{{ route('recordatori.create') }}" class="btn btn-primary">Nueva Home</a>
    <a href="{{ route('createSensor', $home) }}" class="btn btn-primary">Nuevo Sensor</a>
</p>

@if ($recordatoris->isNotEmpty())
    <div>
    <h6> Recordatoris </h6>
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
    </div>
@if ($sensors->isNotEmpty())
<h6> Sensors </h6>

<div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Active</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sensors as $sensor)
            <tr>
                <th scope="row">{{ $sensor->id }}</th>
                <td> {{ $sensor->name }}</td>
                <td> 
                    <form method="POST" action="{{ route('homes.changeState', $sensor->id) }}"> 
                        {{ csrf_field() }} 
                        @if ($sensor->active)    
                        <button type="submit" class="btn btn-success">Active</button>     
                        @else         
                        <button type="submit" class="btn btn-danger">Disabled</button>        
                        @endif      
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    
@else
    <p>No hay Sensors registrados.</p>
@endif


@endsection
</div>