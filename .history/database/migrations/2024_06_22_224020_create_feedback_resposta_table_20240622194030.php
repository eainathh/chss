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
        Schema::create('feedback_respostas', function (Blueprint $table) {
            $table->id();
            $table->string('positivos');
            $table->string('negativos');
            $table->string('duvidas');
            $table->string('sugestoes');
            $table->unsignedBigInteger('id_etapa');
            $table->unsignedBigInteger('id_pessoa');
            $table->foreign('id_etapa')->references('id')->on('feedback_etapa')->onDelete('cascade');
            $table->foreign('id_pessoa')->references('id')->on('feedback_pessoa')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_respostas');
    }
};
