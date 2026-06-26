<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['cantidad', 'idUnidad'])]
class MaterialUnidad extends Model
{
    protected $table = 'material_unidades';

    protected $primaryKey = 'idMaterialUnidad';

    public $timestamps = false;

    public function unidad(): BelongsTo
    {
        return $this->belongsTo(Unidad::class, 'idUnidad', 'idUnidad');
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class, 'codigoMaterial', 'codigo');
    }

    public function presupuesto(): BelongsTo
    {
        return $this->belongsTo(Presupuesto::class, 'codigoPresupuesto', 'codigoPresupuesto');
    }
}
