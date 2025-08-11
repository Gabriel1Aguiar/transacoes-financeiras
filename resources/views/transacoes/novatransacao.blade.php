@extends('layouts.app')

@section('content')
    <div class="container">
        <aside class="sidebar">
            <span>Transação</span>
        </aside>
        <section class="main-content">
            <h1>Nova Transação</h1>

            @if ($errors->any())
                <div style="color:red;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('transacoes.store') }}" method="POST">
                @csrf

                <label>Descrição:</label><br>
                <input type="text" name="descricao" value="{{ old('descricao') }}" required><br><br>

                <label>Valor:</label><br>
                <input type="number" step="0.01" name="valor" value="{{ old('valor') }}" required><br><br>

                <label>CPF:</label><br>
                <input type="text" name="cpf" value="{{ old('cpf') }}" required><br><br>

                <label>Documento:</label><br>
                <input type="text" name="documento" value="{{ old('documento') }}"><br><br>

                <label>Status:</label><br>
                <input type="text" name="status" value="{{ old('status') }}" required><br><br>

                <button class="btn-create" type="submit">Salvar</button>
            </form>

            <br>
            <a class="btn-create" href="{{ route('transacoes.index') }}">
                <button class="btn">Voltar</button>
            </a>
        </section>
    </div>
@endsection
