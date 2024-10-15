@extends('dashboard')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Atualizar Usuario</h1>
</div>

<form class="form" method="POST" action="{{ route('usuarios.update.put', $findUser->id) }}">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input value="{{ $findUser->name }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name">
        @if ($errors->has('name'))
            <div class="invalid-feedback"> {{ $errors->first('name') }} </div>
        @endif
    </div>
    <div class="mb-3">
        <label class="form-label">E-mail</label>
        <input value="{{ $findUser->email }}" type="text" class="form-control" name="email">
    </div>
    <div class="mb-3">
        <label class="form-label">Senha</label>
        <input value="{{ $findUser->password }}" type="password" class="form-control" name="password">
    </div>
    <div class="mb-3">
        <label class="form-label">Permissao</label>
        <select name="permissao_do_usuario" class="form-select" aria-label="Clique para selecionar">
            <option value="IsAdmin" @selected($findUser->permissao_do_usuario == "IsAdmin") >IsAdmin</option>
            <option value="IsUser" @selected($findUser->permissao_do_usuario == "IsUser")>IsUser</option>
          </select>
    </div>

    <button type="submit" class="btn btn-success"> Gravar </button>
</form>

@endsection
