@extends('dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Contatos</h1>
    </div>
    <div>

        <form action="{{ route('contatos.index') }}" method="GET">
            <input type="text" name="pesquisar" placeholder="Digite para pesquisar"/>
            <button type="submit"> Pesquisar</button>
           @can('acessoAPaginaContatos', Auth::user())
                <a type="button" href="{{ route("contatos.create.get") }}" class="btn btn-success float-end">
                Incluir
                </a>
           @endcan


        </form>

        <div class="table-responsive mt-4">
            @if ($findContatos->isEmpty())
                <p> Nao existe dados </p>
            @else
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Numero</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($findContatos as $contato)
                            <tr>
                                <td> {{ $contato->nome }} </td>
                                <td> {{ $contato->numero }} </td>
                                <td> {{ $contato->email }} </td>
                                <td>
                                    <form style="display: inline" action="{{ route('contatos.delete', $contato->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Excluir
                                        </button>
                                    </form>

                                    <form style="display: inline" action="{{ route('contatos.update.get', $contato->id) }}" method="POST">
                                        @csrf
                                        @method('GET')
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Editar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
