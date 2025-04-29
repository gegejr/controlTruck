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
        Schema::create('pneus', function (Blueprint $table) {
            $table->id();
            $table->string('medida');
            $table->string('marca');
            $table->string('modelo');
            $table->enum('tipo', ['novo', 'usado', 'recapado']);
            $table->enum('status', ['em uso', 'em estoque', 'descartado']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pneus');
    }
};
