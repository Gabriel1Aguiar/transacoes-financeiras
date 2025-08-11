@extends('layouts.app')

@section('content')
<style>
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 120px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  border-radius: 4px;
}

.dropdown-content a,
.dropdown-content form {
  display: block;
  padding: 8px 12px;
  text-decoration: none;
  color: black;
  cursor: pointer;
  text-align:center;
}

.dropdown-content a:hover,
.dropdown-content form:hover {
  background-color: #f1f1f1;
}

.show {
  display: block;
}

table{
    text-align:center;
}
</style>

<div class="container">
    <aside class="sidebar">
        <span>Transação</span>
    </aside>
    <section class="main-content">
        <a class="btn-create" onclick="window.location='{{ route('transacoes.create') }}'">
            <button class="btn">Criar Transações</button>
        </a>

        <h2>Transações</h2>
        @if(session('success'))
            <div>{{ session('success') }}</div>
        @endif
        
        <div class="transacoes-list">
            <table>                
                <thead>                    
                    <tr>
                        <th>Valor</th>
                        <th></th>
                        <th>Status</th>
                        <th></th>
                        <th>Data e Hora</th>            
                        <th></th>                        
                    </tr>                    
                </thead>                
                <tbody>                    
                @foreach ($transacoes as $transacao)                    
                    <tr class="transacoes-list">                        
                        <td>R$ {{ number_format($transacao->valor, 2, ',', '.') }}</td>
                        <td>-</td>
                        <td>{{ $transacao->status }}</td>
                        <td>-</td>
                        <td>{{ $transacao->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="dropbtn">⋮</button>
                                <div class="dropdown-content">
                                    <a href="{{ route('transacoes.show', $transacao) }}">Ver</a>
                                    <a href="{{ route('transacoes.edit', $transacao->id) }}">Editar</a>
                                    <form action="{{ route('transacoes.destroy', $transacao->id) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="all: unset; cursor:pointer; padding: 8px 12px; display: block;">Excluir</button>
                                    </form>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
                </tbody>                
            </table>
        </div>
    </section>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      const dropdowns = document.querySelectorAll(".dropdown-content");
      dropdowns.forEach(function(dd) {
        dd.classList.remove('show');
      });
    }
  };

  const buttons = document.querySelectorAll('.dropbtn');
  buttons.forEach(function(button) {
    button.addEventListener('click', function(event) {
      event.stopPropagation();
      const dropdownContent = this.nextElementSibling;
      dropdownContent.classList.toggle('show');
    });
  });
});
</script>

{{ $transacoes->links() }}
@endsection
