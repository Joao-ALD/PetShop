@extends('layouts.app')

@section('content')
<h2>Lista de Espécies</h2>
<a href="{{ route('species.create') }}" class="btn btn-success">Nova Espécie</a>

<table class="table table-striped table-bordered mt-3">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Espécie</th>
            <th>Descrição</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $species as $specie)
        <tr>
            <td>{{ $specie->id }}</td>
            <td>{{ $specie->specie }}</td>
            <td>{{ $specie->description }}</td>
            <td class="align-middle">
                <div class="d-flex gap-2">
                    <a href="{{ route('species.edit', $specie) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form class="d-inline" action="{{ route('species.destroy', $specie->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta espécie ?')">Excluir</button>
                    </form>
                </div>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection