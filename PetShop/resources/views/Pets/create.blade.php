@extends('layouts.app')

@section('content')
<h2>Novo Pet</h2>
<a href="{{ route('pets.index') }}" class="btn btn-secondary mb-3">Voltar</a>

<div class="card">
    <div class="card-body">
        <form action="{{ route('pets.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="mb-3">
                <label>Nome do Pet</label>
                <input type="text" class="form-control" name="name" required placeholder="Example da Silva">
            </div>
            <div class="mb-3">
                <label for="color">Cor</label>
                <input type="text" name="color" class="form-control" required placeholder="Branco">
            </div>
            <div class="mb-3">
                <label for="">Espécie</label>
                <select class="form-select" name="species_id" required>
                    @foreach($species as $specie)
                    <option value="{{ $specie->id }}">{{ $specie->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">Raça</label>
                <select class="form-select" name="breed_id" required>
                    @foreach($breeds as $breed)
                    <option value="{{ $breed->id }}">{{ $breed->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">Tutor</label>
                <select class="form-select" name="owner_id" required>
                    @foreach($owners as $owner)
                    <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" id="foto" name="foto" class="form-control" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>
@endsection