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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('primer_nombre');
            $table->string('segundo_nombre');
            $table->string('primer_apellido');
            $table->string('segundo_apellido');
            $table->integer('telefono');
            $table->integer('celular');
            $table->string('direccion');
            $table->string('email');
            $table->date('fecha_nacimiento');
            $table->string('observaciones');
            $table->unsignedBigInteger('grado_id')->nullable();
            $table->timestamps();
            $table->foreign('grado_id')->references('id')->on('grados')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
