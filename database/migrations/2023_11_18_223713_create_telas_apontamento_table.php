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
        Schema::create('telas_apontamento', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('id_tela');
            $table->foreign('id_tela')->references('id')->on('telas')->onDelete('cascade');

            $table->integer('id_dev');
            $table->enum('tipo',['front','back','ux','infra']);
            $table->string('hora_inicio')->nullable();
            $table->string('hora_final')->nullable();
            $table->string('total_horas')->nullable();

           

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telas_apontamento');
    }
};
