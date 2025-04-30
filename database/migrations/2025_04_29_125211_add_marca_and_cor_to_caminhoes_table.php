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
        Schema::table('caminhoes', function (Blueprint $table) {
            $table->string('marca')->nullable();
            $table->string('cor')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('caminhoes', function (Blueprint $table) {
            $table->dropColumn(['marca', 'cor']);
        });
    }
};
