<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MotoristaController;
use App\Http\Controllers\CaminhaoController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('motoristas')->group(function () {
    Route::get('/', [MotoristaController::class, 'index'])->name('motoristas.index');
    Route::get('/create', [MotoristaController::class, 'create'])->name('motoristas.create');
    Route::post('/', [MotoristaController::class, 'store'])->name('motoristas.store');
    Route::get('/{motorista}/edit', [MotoristaController::class, 'edit'])->name('motoristas.edit');
    Route::put('/{motorista}', [MotoristaController::class, 'update'])->name('motoristas.update');
    Route::delete('/{motorista}', [MotoristaController::class, 'destroy'])->name('motoristas.destroy');
});

Route::resource('caminhoes', CaminhaoController::class);