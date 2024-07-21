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
        Schema::table('spring.postagems', function (Blueprint $table) {
            $table->string("titulo_anterior")->nullable();
            $table->string("slug_anterior")->nullable();
            $table->string("titulo_proximo")->nullable();
            $table->string("slug_proximo")->nullable();
        });

        Schema::table('spring.grupos', function (Blueprint $table) {
            $table->string("titulo_anterior")->nullable();
            $table->string("slug_anterior")->nullable();
            $table->string("titulo_proximo")->nullable();
            $table->string("slug_proximo")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('spring.postagems', function (Blueprint $table) {
            $table->dropColumn("titulo_anterior");
            $table->dropColumn("slug_anterior");
            $table->dropColumn("titulo_proximo");
            $table->dropColumn("slug_proximo");
        });

        Schema::table('spring.grupos', function (Blueprint $table) {
            $table->dropColumn("titulo_anterior");
            $table->dropColumn("slug_anterior");
            $table->dropColumn("titulo_proximo");
            $table->dropColumn("slug_proximo");
        });
    }
};
