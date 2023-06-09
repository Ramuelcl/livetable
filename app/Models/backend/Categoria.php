<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'babosa',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'categoriaable');
    }

    public function videos()
    {
        return $this->morphedByMany(Video::class, 'categoriaable');
    }

    public function imagens()
    {
        return $this->morphedByMany(Imagen::class, 'categoriaable');
    }
}
