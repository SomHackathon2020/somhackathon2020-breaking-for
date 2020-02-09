@extends('layouts.app')

@section('content')
<div class="jumbotron">
<div class="card">
        <h4 class="card-header">Crear Home</h4>
        <div class="card-body">
            <form method="POST" action="{{url('recordatorisHome')}}">
            {!! csrf_field() !!}<!--laravel nos obliga a poner esta instruccion para proteger nuestro codigo en las peticiones POST-->

                <div class="form-group">
                    <label for="name">Nombre: </label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre Recordatorio" value="{{old('name')}}">
                    <label for="hora">Hora Recordatorio: </label>
                    <input type="int" class="form-control" name="hora" id="hora" placeholder="hora" value="{{old('hora')}}">
                    <input  type="int" class="form-control" name="home_id" id="home_id" placeholder="home_id" value="{{$home}}" hidden>

                </div>
                <div class="form-group mt-4">
                    <button type="submit" value="submit" class="btn btn-primary">Crear Recordatorio</button>
                    <a href="{{route('home')}}" class="btn btn-link">Go Back</a>
                </div>
            </form>
        </div>
    </div>
<div>

@endsection