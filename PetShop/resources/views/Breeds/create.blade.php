@extends('layouts.app')

@section('content')
    <h2>Criar nova Espécie</h2>
    <a href="{{ route('species.index') }}" class="btn btn-secondary" >Voltar</a>

    <div class="card mt-3">
        <div class="card-body">
            <form action="{{ route('species.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nome da espécie</label>
                    <input type="text" name="specie" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Descrição da espécie</label>
                    <textarea class="form-control" type="text" name="description" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection 