<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perfil extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'edad',
        'id_profesion',
        'biografia',
        'website',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'edad' => 'integer',
        'id_profesion' => 'integer',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
