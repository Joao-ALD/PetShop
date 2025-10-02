@extends('layouts.app')

@section('content')
<div class="mb-4">
    <h2>Lista de Funcionarios</h2>
    <a href="{{ route('funcionarios.create') }}" class="btn btn-success">Novo Funcionario</a>
</div>

<table class="table table-responsive table-striped table-bordered mt-3">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nome</th>
            <th>Cor</th>
            <th>Espécie</th>
            <th>Raça</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $pets as $pet)
        <tr>
            <td class="align-middle">{{ $pet->id }}</td>
            <td class="align-middle"><img src="{{  asset('storage/' .$pet->foto) }}" class="img-thumbnail" width="100" height="100"></td>
            <td class="align-middle">{{ $pet->nome }}</td>
            <td class="align-middle">{{ $pet->email }}</td>
            <td class="align-middle">{{ $pet->cor }}</td>
            <td class="align-middle">{{ $pet->especie->especie ?? "-" }}</td>
            <td class="align-middle">{{ $pet->raca->raca ?? "-" }}</td>
            <td class="align-middle">
                <div class="d-flex gap-2">
                    <a href="{{ route('pets.edit', $pet) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form class="d-inline" action="{{ route('pets.destroy', $pet) }}" method="post" style="display:inline-block\">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este pet ?')">Excluir</button>
                    </form>
                </div>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection