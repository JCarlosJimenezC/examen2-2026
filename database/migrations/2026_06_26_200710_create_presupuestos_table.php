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
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->id('codigoPresupuesto'); // Llave primaria según el UML
            $table->string('nombrePresupuesto');

            // Llave foránea hacia la tabla Unidad (que hará el equipo 2)
            $table->unsignedBigInteger('idUnidad');
            $table->foreign('idUnidad')->references('idUnidad')->on('unidads')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presupuestos');
    }
};
