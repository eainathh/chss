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
        Schema::create('telas_grupos', function (Blueprint $table) {
            $table->id();
         
            $table->unsignedBigInteger('id_levantamento');
            $table->foreign('id_levantamento')->references('id')->on('telas_levantamento')->onDelete('cascade');
            $table->string('descricao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telas_grupos');
    }
};
