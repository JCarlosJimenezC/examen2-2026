<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Requisicion extends Model
{
    use HasFactory;

    protected $primaryKey = 'idRequisicion';

    protected $fillable = [
        'fecha',
        'estado',
        'idUsuario'
    ];

    // Relación: Una requisición tiene un Usuario asignado (0..* a 1)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'idUsuario');
    }

    // Relación: Una requisición tiene muchos ItemRequisicion (1 a 1..*)
    public function itemRequisiciones()
    {
        return $this->hasMany(ItemRequisicion::class, 'idRequisicion', 'idRequisicion');
    }
}
