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
        Schema::create('informacoes_basicas', function (Blueprint $table) {
            $table->id();
            $table->text('propriedade_tipo');
            $table->text('acomodacoes_tipo');
            $table->text('capacidade_hospedes');
            $table->integer('quartos_quantidade');
            $table->integer('camas_quantidade');
            $table->integer('banheiros_quantidade');
            $table->integer('preco_noite');
            $table->text('politica_cancelamento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacoes_basicas');
    }
};
