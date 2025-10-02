@extends('layouts.app')

@section('content')
<h2>Editar Raça</h2>
<a href="{{ route('breeds.index') }}" class="btn btn-secondary">Voltar</a>

<div class="card">
    <div class="card-body">
        <form action="{{ route('breeds.update', $breed) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!--o laravel EXIGE o método PUT PARA ALTERAÇÕES  -->

            <div class="mb-3">
                <label class="form-label">Raça</label>
                <input type="text" class="form-control" name="breed" value="{{ $breed->breed }}" required>
            </div>
            <div class="mb-3">
                <label for="">Espécie</label>
                <select class="form-select" name="specie_id" required>
                    @foreach($species as $specie)
                    <option value="{{ $specie->id }}" {{ $breed->specie_id == $specie->id ? 'selected' : '' }}>{{ $specie->specie }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Descrição</label>
                <textarea type="text" class="form-control" name="description" rows="3" required>{{ $breed->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
</div>
@endsection