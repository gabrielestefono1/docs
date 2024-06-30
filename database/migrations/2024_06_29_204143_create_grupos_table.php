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
        Schema::create('react.grupos', function (Blueprint $table) {
            $table->id();
            $table->string('title_aside');
            $table->string('slug');
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('react.categorias')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('react.grupos', function (Blueprint $table) {
            $table->dropForeign(['categoria_id']);
        });

        Schema::dropIfExists('react.grupos');
    }
};
