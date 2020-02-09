@extends('layouts.app')

@section('title', "Recordatoris")

@section('content')
<div class="d-flex justify-content-around">
    <p>
        <a href="{{route('home')}}" class="btn btn-primary">Go Back</a>
    </p>
    <p>
        <a href="{{ route('recordatori.create', $home)}}" class="btn btn-primary">Nou Recordatori</a>
    </p>
</div>
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
                                <td id="{{ $recordatori->id }}" value="{{ $recordatori->hora }}"> {{ $recordatori->hora }}</td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" value="{{ $recordatori->activa }}" class="custom-control-input" id="customCheck" name="actiu">
                                        <label class="custom-control-label" for="customCheck">Actiu</label>
                                    </div>
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
            alert("LES PASTILLES LOKO!!");
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


@endsection