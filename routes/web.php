<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MotoristaController;
use App\Http\Controllers\CaminhaoController;
use App\Http\Controllers\Auth\LoginController;

// Rotas públicas
Route::get('/', function () {
    return redirect()->route('login'); // redireciona para login
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.perform');

// Rotas protegidas por auth
Route::middleware(['auth'])->group(function () {

    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Painel (redireciona para listagem de motoristas, por exemplo)
    Route::get('/painel', function () {
        return redirect()->route('motoristas.index');
    })->name('painel');

    // Motoristas
    Route::prefix('motoristas')->group(function () {
        Route::get('/', [MotoristaController::class, 'index'])->name('motoristas.index');
        Route::get('/create', [MotoristaController::class, 'create'])->name('motoristas.create');
        Route::post('/', [MotoristaController::class, 'store'])->name('motoristas.store');
        Route::get('/{motorista}/edit', [MotoristaController::class, 'edit'])->name('motoristas.edit');
        Route::put('/{motorista}', [MotoristaController::class, 'update'])->name('motoristas.update');
        Route::delete('/{motorista}', [MotoristaController::class, 'destroy'])->name('motoristas.destroy');
    });

    // Caminhões
    Route::resource('caminhoes', CaminhaoController::class)->parameters([
        'caminhoes' => 'caminhao'
    ]);
});

Route::middleware('auth')->get('/painel', function () {
    return view('painel.index');
})->name('painel');
