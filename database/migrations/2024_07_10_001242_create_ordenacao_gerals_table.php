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
        Schema::create('ordenacao_gerals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entidade_id');
            $table->string('tipo_entidade')->unique();
            $table->integer('ordem')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenacao_gerals');
    }
};
