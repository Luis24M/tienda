<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'color',
        'id_talla',
        'id_categoria',
        'id_jerarquia',
        'precio',
        'imagen',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function jerarquia()
    {
        return $this->belongsTo(Jerarquia::class, 'id_jerarquia');
    }

    public function talla()
    {
        return $this->belongsTo(Talla::class, 'id_talla');
    }
}
