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
        Schema::create('react.textos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('corpo');
            $table->integer('ordenacao')->unique()->nullable();
            $table->unsignedBigInteger('post_id')->nullable();
            $table->unsignedBigInteger('grupo_id')->nullable();
            $table->timestamps();
        
            $table->foreign('post_id')->references('id')->on('react.posts');
            $table->foreign('grupo_id')->references('id')->on('react.grupos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('react.textos', function (Blueprint $table) {
            $table->dropForeign(['post_id']);
        });

        Schema::table('react.textos', function (Blueprint $table) {
            $table->dropForeign(['grupo_id']);
        });
        
        Schema::dropIfExists('react.textos');
    }
};
