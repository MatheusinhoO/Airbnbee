<?php

use App\Http\Controllers\detalhe_comodacaoController;
use App\Http\Controllers\informacao_basicaController;
use App\Http\Controllers\localizacaoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/teste', function () {
    return view('teste1');
})->name('test1');

Route::get('/detalhe', function () {
    return view('detalhes_da_comodacao');
})->name('canuncio');

Route::get('/localização', function () {
    return view('localizacao');
})->name('canuncio');

Route::get('/informações_basicas', function () {
    return view('informacoes_basicas');
})->name('canuncio');

Route::get('/escolha', function () {
    return view('escolha');
})->name('escolha');

Route::get('/tabela_basica', [localizacaoController::class, 'mostra_localizacao'])->name('tabela');
Route::post('/salva_locação', [detalhe_comodacaoController::class, 'cadastrar_detalhes'])->name('locacao.salva');

Route::post('/tabela_basicaaaaaaaa', [localizacaoController::class, 'mostra_localizacao_filtro'])->name('mostra_locacao_filtro');

Route::post('/salva_informacao_basica', [informacao_basicaController::class, 'cadastrar_informacao_basicas'])->name('informacaosalva');

Route::post('/salva_localizacao', [localizacaoController::class, 'cadastrar_localizacao'])->name('localizacao.salva');

Route::get('/atualizar_localizacao/{id}', [localizacaoController::class, 'atualizar_localizacao']);

Route::post('/muda_localizacao', [localizacaoController::class, 'atualizar_locacao'])->name('alterar_localizacao');

Route::get('/atualizar_informacao/{id}', [informacao_basicaController::class, 'atualizar_informacao']);

Route::post('/muda_informacao', [informacao_basicaController::class, 'atualizar_informacao_basicas'])->name('alterar_informacao');

Route::get('/atualizar_detalhe/{id}', [detalhe_comodacaoController::class, 'atualizar_detalhe']);

Route::post('/muda_detalhe', [detalhe_comodacaoController::class, 'atualizar_detalhe_c'])->name('alterar_detalhe');

Route::get('/localizacao_deletar/{id}', [localizacaoController::class, 'deletar_localizacao']);

Route::post('/deleta_localizacao', [localizacaoController::class, 'deletar_locacao'])->name('apaga_localizacao');

Route::get('/Informações_deletar/{id}', [informacao_basicaController::class, 'deletar_informacoes_basicas']);

Route::post('/deleta_informacao', [informacao_basicaController::class, 'deletar_informacoes'])->name('apaga_informacoes_basicas');

Route::get('/detalhe_deletar/{id}', [detalhe_comodacaoController::class, 'deletar_detalhes_comodacoes']);

Route::post('/deleta_detalhe', [detalhe_comodacaoController::class, 'deletar_detalhe'])->name('apaga_detalhe_comodacoes');
require __DIR__.'/auth.php';
