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
        Schema::create('portfolio.contatos', function (Blueprint $table) {
            $table->id();
            $table->string("mensagem_inicial");
            $table->string("whatsapp");
            $table->string("whatsapp_icon");
            $table->string("whatsapp_link")->nullable();
            $table->string("email");
            $table->string("email_icon");
            $table->string("email_link")->nullable();
            $table->string("linkedin");
            $table->string("linkedin_icon");
            $table->string("linkedin_link")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio.contatos');
    }
};
