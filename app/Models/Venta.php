<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_producto',
        'cantidad',
        'id_boleta',
        'evidencia_pago',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function boleta()
    {
        return $this->belongsTo(Boleta::class, 'id_boleta');
    }
}
