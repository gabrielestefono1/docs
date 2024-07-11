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
        Schema::create('ordenacao_grupos_postagens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grupo_id')->unique()->constrained('grupos')->onDelete('cascade');
            $table->foreignId('postagem_id')->unique()->constrained('postagens')->onDelete('cascade');
            $table->integer('ordem');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenacao_grupos_postagens');
    }
};
