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
        Schema::create('contenido_ejercicio', function (Blueprint $table) {
            $table->id('id_contenido');
            $table->string('contenido_path')->nullable();
            $table->string('tipo_contenido')->nullable();
            $table->unsignedBigInteger('id_ejercicio');
            $table->timestamps();

            $table->foreign('id_ejercicio')->references('id_ejercicio')->on('ejercicios')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenido_ejercicio');
    }
};
