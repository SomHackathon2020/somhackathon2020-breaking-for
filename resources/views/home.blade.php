@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($homes->isNotEmpty())
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($homes as $home)
                        <tr>
                            <th scope="row">{{ $home->id }}</th>
                            <td> {{ $home->name }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        <p>No hay homes registrados.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
