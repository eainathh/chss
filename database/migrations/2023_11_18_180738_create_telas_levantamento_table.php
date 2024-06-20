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
        Schema::create('telas_levantamento', function (Blueprint $table) {
            $table->id();
          
          
            $table->unsignedBigInteger('id_projeto');
            $table->foreign('id_projeto')->references('id')->on('projetos')->onDelete('cascade');

            $table->decimal("markup",10,2)->nullable();
            
            $table->decimal("custo_hora_front_end",10,2)->nullable();
            $table->decimal("total_hora_front_end",10,2)->nullable();
            $table->decimal("sub_total_front_end",10,2)->nullable();
            $table->decimal("total_front_end",10,2)->nullable();

            $table->decimal("custo_hora_back_end",10,2)->nullable();
            $table->decimal("total_hora_back_end",10,2)->nullable();
            $table->decimal("sub_total_back_end",10,2)->nullable();
            $table->decimal("total_back_end",10,2)->nullable();
            
            $table->decimal("custo_hora_ux",10,2)->nullable();
            $table->decimal("total_hora_ux",10,2)->nullable();
            $table->decimal("sub_total_ux",10,2)->nullable();
            $table->decimal("total_ux",10,2)->nullable();
            
            $table->decimal("custo_hora_gerenciamento",10,2)->nullable();
            $table->decimal("total_hora_gerenciamento",10,2)->nullable();
            $table->decimal("sub_total_gerenciamento",10,2)->nullable();
            $table->decimal("total_gerenciamento",10,2)->nullable();
       
            $table->decimal("total_horas",10,2)->nullable();
            $table->decimal("sub_total",10,2)->nullable();
            $table->decimal("total",10,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telas_levantamento');
    }
};
