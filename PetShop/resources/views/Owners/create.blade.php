@extends('layouts.app')

@section('content')
<h2>Novo(a) Tutor(a)</h2>
<a href="{{ route('owners.index') }}" class="btn btn-secondary mb-3">Voltar</a>

<div class="card">
    <div class="card-body">
        <form action="{{ route('owners.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="mb-3">
                <label>Nome Completo</label>
                <input type="text" class="form-control" name="name" required placeholder="Example da Silva">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required placeholder="example@example.com">
            </div>
            <div class="mb-3">
                <label>Telefone</label>
                <input type="text" name="phone" class="form-control" required placeholder="(99) 99999-9999">
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Foto</label>
                <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>
@endsection