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
        Schema::create('projetos_pagamento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_projeto');
            $table->foreign('id_projeto')->references('id')->on('projetos')->onDelete('cascade');
            $table->decimal('valor',10,2)->nullable();
            $table->date('vencimento')->nullable();
            $table->enum('status',['pago','pendente','cancelado'])->default('pendente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projetos_pagamento');
    }
};
