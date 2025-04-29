<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movimentacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('motorista_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('caminhao_id')->constrained('caminhoes')->onDelete('cascade');
            $table->foreignId('eixo_id')->constrained('eixos')->onDelete('cascade');
            $table->foreignId('pneu_id')->constrained('pneus')->onDelete('cascade');
            $table->foreignId('empresa_terceirizada_id')->nullable()->constrained('empresas_terceirizadas')->onDelete('set null');
            $table->enum('tipo_movimentacao', ['troca', 'recapagem', 'descarte', 'compra']);
            $table->date('data_movimentacao');
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimentacoes');
    }
};
