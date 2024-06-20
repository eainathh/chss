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
        Schema::create('telas', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger('id_grupo');
            $table->foreign('id_grupo')->references('id')->on('telas_grupos')->onDelete('cascade');

            $table->string('descricao');
           
            $table->decimal('front_end',10,2);
            $table->decimal('back_end',10,2);
            $table->decimal('ux',10,2);
            $table->decimal('gerenciamento',10,2);
            $table->enum('status',['desenvolvimento','finalizado','tester','nao_iniciado'])->default(('nao_iniciado'));
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telas');
    }
};
