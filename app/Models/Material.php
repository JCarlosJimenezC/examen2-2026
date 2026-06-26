<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $primaryKey = 'codigo';

    protected $fillable = [
        'unidadMedida',
        'descripcion',
        'ubicacion',
        'idCategoria',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria', 'idCategoria');
    }
}
