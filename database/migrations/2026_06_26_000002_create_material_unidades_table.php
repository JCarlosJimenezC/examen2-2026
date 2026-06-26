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
        Schema::create('material_unidades', function (Blueprint $table) {
            $table->increments('idMaterialUnidad');
            $table->unsignedInteger('cantidad');
            $table->unsignedInteger('idUnidad');
            $table->unsignedInteger('codigoMaterial');
            $table->unsignedInteger('codigoPresupuesto');

            $table->index('codigoMaterial');
            $table->index('codigoPresupuesto');

            $table->foreign('idUnidad')
                ->references('idUnidad')
                ->on('unidades')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_unidades');
    }
};
