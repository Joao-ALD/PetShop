@extends('layouts.app')

@section('content')
<h2>Novo(a) Funcionário(a)</h2>
<a href="{{ route('funcionarios.index') }}" class="btn btn-secondary mb-3">Voltar</a>

<div class="card">
    <div class="card-body">
        <form action="{{ route('funcionarios.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="mb-3">
                <label>Nome Completo</label>
                <input type="text" class="form-control" name="nome" required placeholder="Example da Silva">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required placeholder="example@example.com">
            </div>
            <div class="mb-3">
                <label>Telefone</label>
                <input type="text" name="telefone" class="form-control" required placeholder="(99) 99999-9999">
            </div>
            <div class="mb-3">
                <label for="">Cargo</label>
                <select class="form-select" name="cargo_id" required>
                    @foreach($cargos as $cargo)
                    <option value="{{ $cargo->id }}">{{ $cargo->cargo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">Função</label>
                <select class="form-select" name="funcao_id" required>
                    @foreach($funcaos as $funcao)
                    <option value="{{ $funcao->id }}">{{ $funcao->funcao }}</option>
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