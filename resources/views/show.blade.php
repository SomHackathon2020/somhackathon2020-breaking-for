@extends('layout')

@section('title', "Recordatorios")

@section('content')

    @foreach($recordatorios as $recordatorio)
        <tr>
            <th scope="row">{{ $recordatorio->id }}</th>
            <td> {{ $recordatorio->name }}</td>
            <td> {{ $recordatorio->Hora }}</td>

        </tr>
    @endforeach

    <h1>Home #{{ $user->id }}</h1>


    <p>Nombre del usuario: {{$user->name}}</p>
    <p>Correo electrónico: {{$user->email}}</p>

    <p>
        <!--<a href="{{url('/usuarios')}}">Go Back</a>-->
            <a href="{{route('home')}}">Go Back</a>
    </p>

    <!--Hace lo mismo que el link de arriba
    <p>
        <a href="{{action('UserController@index')}}">Go Back</a>

    </p>
    -->
@endsection