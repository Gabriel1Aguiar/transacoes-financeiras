@extends('layouts.app')

@section('content')
    <div class="container">
        <aside class="sidebar">
            <span>Transação</span>
        </aside>
        <section class="main-content">
            <h1>Editar Transação</h1>

            @if ($errors->any())
                <div style="color:red;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('transacoes.update', $transacao->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label>Descrição:</label><br>
                <input type="text" name="descricao" value="{{ old('descricao', $transacao->descricao) }}" required><br><br>

                <label>Valor:</label><br>
                <input type="number" step="0.01" name="valor" value="{{ old('valor', $transacao->valor) }}" required><br><br>

                <label>CPF:</label><br>
                <input type="text" name="cpf" value="{{ old('cpf', $transacao->cpf) }}" required><br><br>

                <label>Status:</label><br>
                <select name="status" required>
                    @foreach (['Em processamento', 'Aprovada', 'Negada'] as $status)
                        <option value="{{ $status }}" {{ old('status', $transacao->status) == $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select><br><br>

                <label>Documento:</label><br>
                @if ($transacao->documento)
                    <a href="{{ asset('storage/' . $transacao->documento) }}" target="_blank">Documento atual</a><br>
                @endif
                <input type="file" name="documento" accept=".pdf,.jpeg,.png,.jpg"><br><br>

                <button class="btn-create" type="submit">Salvar alterações</button>
            </form>

            <br>
            <a class="btn-create" href="{{ route('transacoes.index') }}">Voltar</a>
        </section>
    </div>
@endsection
