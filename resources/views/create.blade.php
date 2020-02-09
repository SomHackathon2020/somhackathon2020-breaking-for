@extends('layouts.app')

@section('content')
<div class="card">
        <h4 class="card-header">Crear Home</h4>
        <div class="card-body">
            <form method="POST" action="{{url('homes')}}">
            {!! csrf_field() !!}<!--laravel nos obliga a poner esta instruccion para proteger nuestro codigo en las peticiones POST-->

                <div class="form-group">
                    <label for="name">Nombre: </label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nom casa" value="{{old('name')}}">
                <label for="name">Token de la casa: </label>
                    <input type="text" class="form-control" name="token_home" id="token_home" placeholder="Token casa" value="{{old('token_home')}}">
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Crear home</button>
                    <a href="{{route('home')}}" class="btn btn-link">Go Back</a>
                </div>
            </form>
        </div>
    </div>

@endsection