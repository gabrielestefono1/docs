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
        Schema::create('spring.ordenacao_grupos_postagens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grupo_id')->constrained('spring.grupos')->onDelete('cascade');
            $table->morphs('ordenavel');
            $table->integer('ordem');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spring.ordenacao_grupos_postagens');
    }
};
