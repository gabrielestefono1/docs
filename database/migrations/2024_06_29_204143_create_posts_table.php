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
        Schema::create('react.posts', function (Blueprint $table) {
            $table->id();
            $table->string('title_aside');
            $table->boolean('tem_filhos')->default(false);
            $table->boolean('filho')->default(false);
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->unsignedBigInteger('id_pai')->nullable();
            $table->timestamps();
        
            $table->foreign('categoria_id')->references('id')->on('react.categorias')->onDelete('set null');
            $table->foreign('id_pai')->references('id')->on('react.posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('react.posts', function (Blueprint $table) {
            $table->dropForeign(['categoria_id']);
        });
        
        Schema::dropIfExists('react.posts');
    }
};
