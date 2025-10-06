@extends('layouts.app')

@section('tltle', 'PetShop - Pets')

@section('content')
<div class="mb-4">
    <h2>Lista de Tutores</h2>
    <a href="{{ route('owners.create') }}" class="btn btn-success">Novo Tutor</a>
</div>

<table class="table table-responsive table-striped table-bordered mt-3">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $owners as $owner)
        <tr>
            <td class="align-middle">{{ $owner->id }}</td>
            <td class="align-middle"><img src="{{  asset('storage/' .$owner->photo) }}" class="img-thumbnail" width="100" height="100"></td>
            <td class="align-middle">{{ $owner->name }}</td>
            <td class="align-middle">{{ $owner->email }}</td>
            <td class="align-middle">{{ $owner->phone }}</td>
            <td class="align-middle">
                <div class="d-flex gap-2">
                    <a href="{{ route('owners.edit', $owner) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form class="d-inline" action="{{ route('owners.destroy', $owner) }}" method="post" style="display:inline-block\">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este tutor ?')">Excluir</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection