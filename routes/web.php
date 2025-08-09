<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthWebController;

Route::get('/', function () {return view('welcome');});
Route::get('/login', [AuthWebController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthWebController::class, 'login'])->name('login.process');

Route::get('/transacoes', function () {
    return 'Bem-vindo às transações!';
})->name('transacoes')->middleware('auth');
