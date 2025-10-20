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
            Schema::create('localizacao', function (Blueprint $table) {
            $table->id();
            $table->text('endereco');
            $table->text('entrega_chave_metodo');
            $table->text('informacao_estacionamento');
            $table->date('calendario_disponibilidade');
            $table->integer('duracao_estadia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('localizacao');
    }
};
