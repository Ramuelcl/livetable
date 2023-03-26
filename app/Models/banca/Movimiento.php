<?php

namespace App\Models\banca;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movimiento extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cuenta',
        'tipo',
        'dateMouvement',
        'libelle',
        'montant',
        'cliente_id',
        'releve',
        'dateReleve',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'dateMouvement' => 'date',
        'montant' => 'decimal:2',
        'cliente_id' => 'integer',
        'releve' => 'integer',
        'dateReleve' => 'date',
    ];
}
