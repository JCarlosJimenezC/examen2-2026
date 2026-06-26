<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['nombre'])]
class Unidad extends Model
{
    protected $table = 'unidades';

    protected $primaryKey = 'idUnidad';

    public $timestamps = false;

    public function materialesUnidad(): HasMany
    {
        return $this->hasMany(MaterialUnidad::class, 'idUnidad', 'idUnidad');
    }

    public function presupuestos(): HasMany
    {
        return $this->hasMany(Presupuesto::class, 'idUnidad', 'idUnidad');
    }
}
