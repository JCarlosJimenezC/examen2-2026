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
        Schema::create('requisicions', function (Blueprint $table) {
            $table->id('idRequisicion'); // Llave primaria según el UML
            $table->dateTime('fecha');
            $table->string('estado');

            // Llave foránea hacia Usuario
            // Nota: El UML dice que idUsuario es String. Si el equipo 1 lo hace string, usa esto:
            $table->string('idUsuario');
            $table->foreign('idUsuario')->references('idUsuario')->on('usuarios')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisicions');
    }
};
