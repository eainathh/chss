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
        Schema::create('dados_colaborador', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->decimal('salario',10,2)->nullable();
            $table->integer('horas_mes')->nullable();
            $table->decimal('valor_hora',10,2)->nullable();
            $table->string('funcao')->nullable();
            $table->enum('nivel',['junior','pleno','senior'])->nullable();
            $table->enum('regime',['freelance','fixo'])->nullable();
            $table->longText('foto')->nullable();
            $table->text('observacoes')->nullable();
            $table->date('data_contratacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dados_colaborador');
    }
};
