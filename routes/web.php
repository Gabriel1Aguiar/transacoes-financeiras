<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthWebController;
use App\Http\Controllers\Web\TransacaoController;

Route::get('/',  [AuthWebController::class, 'showLoginForm'])->name('login.form');
Route::get('/login', [AuthWebController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthWebController::class, 'login'])->name('login.process');

Route::resource('transacoes', TransacaoController::class)->middleware('auth:web');


Route::get('/novatransacao', [TransacaoController::class, 'create'])->name('transacoes.create');
Route::post('/novatransacao', [TransacaoController::class, 'store'])->name('transacoes.store');
Route::get('/transacoes/{transacao}', [TransacaoController::class, 'show'])->name('transacoes.show');
Route::middleware('auth')->group(function () {
    Route::get('/transacoes/{transacao}/edit', [TransacaoController::class, 'edit'])
        ->name('transacoes.edit')
        ->scopeBindings();

    Route::put('/transacoes/{transacao}', [TransacaoController::class, 'update'])
        ->name('transacoes.update')
        ->scopeBindings();
});
Route::delete('/transacoes/{transacao}', [TransacaoController::class, 'destroy'])->name('transacoes.destroy');
