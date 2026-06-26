<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $primaryKey = 'idCategoria';

    protected $fillable = [
        'nombre',
    ];

    public function materiales()
    {
        return $this->hasMany(Material::class, 'idCategoria', 'idCategoria');
    }
}
