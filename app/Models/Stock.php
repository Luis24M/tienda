<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = ['id_producto', 'id_talla', 'cantidad', 'umbral_minimo'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
    
    public function talla()
    {
        return $this->belongsTo(Talla::class, 'id_talla');
    }
}
