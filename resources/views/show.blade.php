@extends('layouts.app')

@section('title', "Recordatoris")

@section('content')
<div class="d-flex justify-content-around">

    <p>
        <a href="{{route('home')}}" class="btn btn-secondary">Enrere</a>
        <a href="{{ route('recordatori.create', $home) }}" class="btn btn-primary">Nou Recordatori</a>
        <a href="{{ route('createSensor', $home) }}" class="btn btn-primary">Nou Sensor</a>
    </p>
</div>

<h4 align="center">Token de la casa: {{ DB::table('home')->where('id', $home)->get()[0]->token_home }}</h4>

<div class="jumbotron">

    @if ($recordatoris->isNotEmpty())
        <div class="row justify-content-center">
            <div class="col-md-8">
            <h4> Recordatoris </h4>
                <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Hora</th>
                                <th scope="col"></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recordatoris as $recordatori)
                            <tr>
                                <th scope="row">{{ $recordatori->id }}</th>
                                <td> {{ $recordatori->name }}</td>
                                <td id="{{ $recordatori->id }}" value="{{ $recordatori->hora }}"> {{ $recordatori->hora }}</td>
                                <td><button class="btn btn-primary btn-sm" onclick="recorda()">Activa</button></td>
                                <td>
                                     <form action="{{ route('recordatoris.destroy', $recordatori->id) }}" method = "POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                       
                                        <button type="submit" class="btn btn-link"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
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
<br>
@if ($sensors->isNotEmpty())
<div class="row justify-content-center">
        <div class="col-md-8">
        <h4> Sensors </h4>
            <div class="card">
                <div class="card-header"></div>
                    <div class="card-body">
                        <div>
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Active</th>
                                        <th></th>
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
                                                <button type="submit" class="btn btn-success btn-sm">Activat</button>     
                                                @else         
                                                <button type="submit" class="btn btn-danger btn-sm">Desectivat</button>        
                                                @endif      
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('sensors.destroy', $sensor->id) }}" method = "POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            
                                                <button type="submit" class="btn btn-link"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <p>No hay Sensors registrados.</p>
@endif


@endsection


