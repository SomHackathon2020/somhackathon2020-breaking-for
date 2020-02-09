@extends('layouts.app')

@section('title', "Recordatoris")

@section('content')
<div class="d-flex justify-content-around">

    <p>
        <a href="{{route('home')}}" class="btn btn-secondary">Go Back</a>
        <a href="{{ route('recordatori.create') }}" class="btn btn-primary">Nueva Home</a>
        <a href="{{ route('createSensor', $home) }}" class="btn btn-primary">Nuevo Sensor</a>
    </p>
</div>
<h6> Recordatoris </h6>

<div class="jumbotron">
    @if ($recordatoris->isNotEmpty())
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Hora</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recordatoris as $recordatori)
                            <tr>
                                <th scope="row">{{ $recordatori->id }}</th>
                                <td> {{ $recordatori->name }}</td>
                                <td value="{{ $recordatori->hora }}"> {{ $recordatori->hora }}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
    function checkDate() {
        hora = document.getElementById('{{ $recordatori->id }}').getAttribute('value');
        var date = new Date();
        
        if(date.getDay() === 0 && date.getHours() === parseInt(hora)) {
            alert("LES PASTILLES !!!!");
        }
    }

        function recorda() {
            setInterval(function(){ checkDate() }, 10000);
        }
 </script>
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

