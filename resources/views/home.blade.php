@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-around align-items-end mb-3">
        <h1 class="pb-1">Les meves cases</h1>
        <p>
            <a href="{{ route('homes.create') }}" class="btn btn-primary">Afegir casa</a>
        </p>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

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
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Opcions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($homes as $home)
                        <tr>
                            <th scope="row">{{ $home->id }}</th>
                            <td> {{ $home->name }}</td>
                            <td>
                                <form action="{{ route('homes.destroy', $home) }}" method = "POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a href="{{ route('homes.show', $home) }}" class="btn btn-link"><i class="far fa-eye"></i></a>
                                    <button type="submit" class="btn btn-link"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
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
