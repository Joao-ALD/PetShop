@extends('layouts.app')

@section('content')
<h2>Editar Espécie</h2>
<a href="{{ route('species.index') }}" class="btn btn-secondary">Voltar</a>

<div class="card">
    <div class="card-body">
        <form action="{{ route('species.update', $specie) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!--o laravel EXIGE o método PUT PARA ALTERAÇÕES  -->

            <div class="mb-3">
                <label class="form-label">Espécie</label>
                <input type="text" class="form-control" name="specie" value="{{ $specie->specie }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Descrição</label>
                <textarea type="text" class="form-control" name="description" rows="3" required>{{ $specie->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
</div>
@endsection