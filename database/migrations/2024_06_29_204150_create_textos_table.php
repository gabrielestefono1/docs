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
            $table->unsignedBigInteger('post_id');
            $table->timestamps();
        
            $table->foreign('post_id')->references('id')->on('react.posts');
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
        
        Schema::dropIfExists('react.textos');
    }
};
