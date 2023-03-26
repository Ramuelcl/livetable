<?php

namespace App\Models\ventas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\backend\Entidad;

class Cliente extends Entidad
{
    use HasFactory;

    public function movimientos()
    {
        return $this->belongsToMany(\App\Models\banca\Movimiento::class, 'xMovimientos');
    }
}
