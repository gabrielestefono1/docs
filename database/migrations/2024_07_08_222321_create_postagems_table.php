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
        Schema::create('spring.postagems', function (Blueprint $table) {
            $table->id();
            $table->text('descricao');
            $table->string('titulo', 255);
            $table->string('slug', 255);
            $table->foreignId('grupo_id')->nullable()->constrained('spring.grupos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spring.postagems');
    }
};
