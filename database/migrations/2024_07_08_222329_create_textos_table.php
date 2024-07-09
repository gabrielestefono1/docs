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
        Schema::create('spring.textos', function (Blueprint $table) {
            $table->id();
            $table->text('descricao');
            $table->string('titulo', 255);
            $table->integer('ordem');
            $table->foreignId('postagem_id')->constrained('spring.postagems')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spring.textos');
    }
};
