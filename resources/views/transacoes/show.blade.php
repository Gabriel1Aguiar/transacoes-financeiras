@extends('layouts.app')

@section('content')
    <div class="container">
        <aside class="sidebar">
            <span>Transação</span>
        </aside>
        <section class="main-content">
            <h1>Detalhes da Transação</h1>

            <p><strong>Descrição:</strong> {{ $transacao->descricao }}</p>
            <p><strong>Valor:</strong> R$ {{ number_format($transacao->valor, 2, ',', '.') }}</p>
            <p><strong>CPF:</strong> {{ $transacao->cpf }}</p>
            <p><strong>Status:</strong> {{ $transacao->status }}</p>
            @if ($transacao->documento)
                <p><strong>Documento:</strong> <a href="{{ asset('storage/' . $transacao->documento) }}" target="_blank">Ver documento</a></p>
            @else
                <p><strong>Documento:</strong> Nenhum documento anexado</p>
            @endif

            <a class="btn-create" href="{{ route('transacoes.index') }}">Voltar</a>
        </section>
    </div>
@endsection
