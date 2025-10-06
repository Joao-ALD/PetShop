@extends('layouts.app')

@section('title', 'PetShop - Pets')

@section('content')
<div class="mb-4">
    <h2>Lista de Pets</h2>
    <a href="{{ route('pets.create') }}" class="btn btn-success">Novo Pet</a>
</div>

<table class="table table-responsive table-striped table-bordered mt-3">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nome</th>
            <th>Tutor</th>
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
            <td class="align-middle"><img src="{{  asset('storage/' .$pet->photo) }}" class="img-thumbnail" width="100" height="100"></td>
            <td class="align-middle">{{ $pet->name }}</td>
            <td class="align-middle">{{ $pet->owner->name }}</td>
            <td class="align-middle">{{ $pet->color }}</td>
            <td class="align-middle">{{ $pet->breed->specie->specie ?? "-" }}</td>
            <td class="align-middle">{{ $pet->breed->breed ?? "-" }}</td>
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