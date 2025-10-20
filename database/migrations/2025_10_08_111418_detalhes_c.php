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
            Schema::create('detalhes_c', function (Blueprint $table) {
            $table->id();
            $table->text('titulo');
            $table->text('descricao');
            $table->text('destaques');
            $table->text('comodidades_oferecidas');
            $table->text('permite_fumar');
            $table->text('permite_festa');
            $table->text('permite_animais');
            $table->date('horario_check_in');
            $table->date('horario_check_out');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalhes_c');
    }
};
