<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presupuesto extends Model
{
    use HasFactory;

    protected $primaryKey = 'codigoPresupuesto';

    protected $fillable = [
        'nombrePresupuesto',
        'idUnidad'
    ];

    // Relación: Un presupuesto pertenece a una Unidad (1 a 1..*)
    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'idUnidad', 'idUnidad');
    }

    // Relación: Un presupuesto se usa para comprar muchos MaterialUnidad (1 a 0..*)
    public function materialUnidades()
    {
        return $this->hasMany(MaterialUnidad::class, 'codigoPresupuesto', 'codigoPresupuesto');
    }
}
