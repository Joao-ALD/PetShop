@extends('layouts.app')

@section('content')
<h2>Editar Funcionário</h2>
<a href="{{ route('funcionarios.index') }}" class="btn btn-secondary mb-3">Voltar para a lista</a>

<div class="card">
    <div class="card-body">
        <form action="{{ route('funcionarios.update', $funcionario) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!--o laravel EXIGE o método PUT para ALTERAÇÕES  -->
            <div class="mb-3">
                <label>Nome Completo</label>
                <input type="text" class="form-control" name="nome" value="{{ $funcionario->nome }}" placeholder="{{ $funcionario->nome }}" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $funcionario->email }}" placeholder="{{ $funcionario->email }}" required>
            </div>
            <div class="mb-3">
                <label>Telefone</label>
                <input type="text" name="telefone" class="form-control" value="{{ $funcionario->telefone }}" placeholder="{{ $funcionario->telefone}}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Foto Atual</label><br>
                <img src="{{  asset('storage/' .$funcionario->picture) }}" class="img-thumbnail mb-2" width="150" alt="Foto Atualmente cadastrada no funcionário">
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Alterar foto</label>
                <input type="file" id="picture" name="picture" class="form-control" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
</div>
@endsection