<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transacao;
use Illuminate\Support\Facades\Auth;

class TransacaoController extends Controller
{
    public function index()
    {
        $transacoes = auth()->user()->transacoes()->paginate(10);
        return view('transacoes.index', compact('transacoes'));
    }

    public function show($id)
    {
        $transacao = auth()->user()->transacoes()->findOrFail($id);
        return view('transacoes.show', compact('transacao'));
    }

    public function create()
    {
        return view('transacoes.novatransacao');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'cpf' => 'required|string|max:20',
            'status' => 'required|in:Em processamento,Aprovada,Negada',
            'documento' => 'nullable|file|mimes:pdf,jpeg,png,jpg',
        ]);

        $transacao = new Transacao();
        $transacao->user_id = Auth::id();
        $transacao->descricao = $request->descricao;
        $transacao->valor = $request->valor;
        $transacao->cpf = $request->cpf;
        $transacao->status = $request->status;

        if ($request->hasFile('documento')) {
            $path = $request->file('documento')->store('documentos');
            $transacao->documento = $path;
        }

        $transacao->save();

        return redirect()->route('transacoes.index')->with('success', 'Transação cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $transacao = auth()->user()->transacoes()->findOrFail($id);

        return view('transacoes.edit', compact('transacao'));
    }

    public function update(Request $request, Transacao $transacao,  $id)
    {
        $transacao = auth()->user()->transacoes()->findOrFail($id);
        $this->authorize('update', $transacao);

        $request->validate([
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'cpf' => 'required|string|max:20',
            'status' => 'required|in:Em processamento,Aprovada,Negada',
            'documento' => 'nullable|file|mimes:pdf,jpeg,png,jpg',
        ]);

        if ($request->hasFile('documento')) {
            $path = $request->file('documento')->store('documentos');
            $transacao->documento = $path;
        }

        $transacao->update($request->only(['descricao', 'valor', 'cpf', 'status', 'documento']));

        return redirect()->route('transacoes.index')->with('success', 'Transação atualizada');
    }

    public function destroy(Transacao $transacao, $id)
    {
        $transacao = auth()->user()->transacoes()->findOrFail($id);
        $this->authorize('delete', $transacao);
        $transacao->delete();
        return redirect()->route('transacoes.index')->with('success', 'Transação excluída');
    }
}
