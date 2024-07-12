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
        Schema::create('spring.ordenacao_textos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('postagem_id')->unique()->constrained('spring.postagems')->onDelete('cascade');
            $table->foreignId('texto_id')->unique()->constrained('spring.textos')->onDelete('cascade');
            $table->integer('ordem')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spring.ordenacao_textos');
    }
};
