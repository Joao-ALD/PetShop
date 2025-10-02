@extends('layouts.app')

@section('content')
<h2>Editar Tutor</h2>
<a href="{{ route('owners.index') }}" class="btn btn-secondary mb-3">Voltar para a lista</a>

<div class="card">
    <div class="card-body">
        <form action="{{ route('owners.update', $owner) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!--o laravel EXIGE o método PUT para ALTERAÇÕES  -->
            <div class="mb-3">
                <label>Nome Completo</label>
                <input type="text" class="form-control" name="name" value="{{ $owner->name }}" placeholder="{{ $owner->name }}" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $owner->email }}" placeholder="{{ $owner->email }}" required>
            </div>
            <div class="mb-3">
                <label>phone</label>
                <input type="text" name="telefone" class="form-control" value="{{ $owner->phone }}" placeholder="{{ $owner->phone}}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Foto Atual</label><br>
                <img src="{{  asset('storage/' .$owner->photo) }}" class="img-thumbnail mb-2" width="150" alt="Foto Atualmente cadastrada no tutor">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Alterar foto</label>
                <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
</div>
@endsection