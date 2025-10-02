@extends('layouts.app')

@section('content')
<h2>Criar nova Raça</h2>
<a href="{{ route('breeds.index') }}" class="btn btn-secondary">Voltar</a>

<div class="card mt-3">
    <div class="card-body">
        <form action="{{ route('breeds.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nome da Raça</label>
                <input type="text" name="breed" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="specie_id" class="form-label">Espécie</label>
                <select name="specie_id" class="form-control" required>
                    <option value="">Selecione a espécie</option>
                    @foreach($species as $specie)
                    <option value="{{ $specie->id }}">
                        {{ $specie->specie }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Descrição da raça</label>
                <textarea class="form-control" type="text" name="description" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>
@endsection