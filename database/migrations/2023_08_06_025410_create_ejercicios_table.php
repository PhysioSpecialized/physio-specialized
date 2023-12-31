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
        Schema::create('ejercicios', function (Blueprint $table) {
            $table->id('id_ejercicio');
            $table->string('nombre');
            $table->longText('descripcion');
            $table->unsignedBigInteger('id_categoria');
            $table->timestamps();

            $table->foreign('id_categoria')->references('id_categoria')->on('categorias')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejercicios');
    }
};
