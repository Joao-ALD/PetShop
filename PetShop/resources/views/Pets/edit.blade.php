@extends('layouts.app')

@section('content')
<h2>Editar Pet</h2>
<a href="{{ route('pets.index') }}" class="btn btn-secondary mb-3">Voltar para a lista</a>

<div class="card">
    <div class="card-body">
        <form action="{{ route('pets.update', $pet) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Laravel exige método PUT para update -->

            <div class="mb-3">
                <label>Nome do Pet</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $pet->name) }}" required>
            </div>

            <div class="mb-3">
                <label>Cor</label>
                <input type="text" name="color" class="form-control" value="{{ old('color', $pet->color) }}" required>
            </div>

            <div class="mb-3">
                <label>Espécie</label>
                <select class="form-select" name="specie_id" required>
                    <option value="">Selecione a espécie</option>
                    @foreach($species as $specie)
                        <option value="{{ $specie->id }}" {{ old('specie_id', $pet->specie_id) == $specie->id ? 'selected' : '' }}>
                            {{ $specie->specie }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Raça</label>
                <select class="form-select" name="breed_id" required>
                    <option value="">Selecione a raça</option>
                    @foreach($breeds as $breed)
                        <option value="{{ $breed->id }}" {{ old('breed_id', $pet->breed_id) == $breed->id ? 'selected' : '' }}>
                            {{ $breed->breed }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Tutor</label>
                <select class="form-select" name="tutor_id" required>
                    <option value="">Selecione o tutor</option>
                    @foreach($owners as $owner)
                        <option value="{{ $tutor->id }}" {{ old('tutor_id', $pet->tutor_id) == $tutor->id ? 'selected' : '' }}>
                            {{ $tutor->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Foto Atual</label><br>
                @if($pet->foto)
                    <img src="{{ asset('storage/' . $pet->foto) }}" class="img-thumbnail mb-2" width="150" alt="Foto atual do pet">
                @else
                    <p>Sem foto cadastrada.</p>
                @endif
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Alterar foto</label>
                <input type="file" id="foto" name="foto" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
</div>
@endsection