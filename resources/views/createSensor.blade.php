@extends('layouts.app')

@section('content')
<div class="card">
        <h4 class="card-header">Crear Sensor</h4>
        <div class="card-body">
            <form method="POST" action="{{url('saveSensor', $home)}}">
            {!! csrf_field() !!}<!--laravel nos obliga a poner esta instruccion para proteger nuestro codigo en las peticiones POST-->

                <div class="form-group">
                    <label for="name">Nom: </label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nom sensor" value="{{old('name')}}">
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Crear sensor</button>
                    <a href="{{route('home')}}" class="btn btn-link">Go Back</a>
                </div>
            </form>
        </div>
    </div>

@endsection