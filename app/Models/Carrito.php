<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $fillable = ['id_vendedor'];

    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class, 'id_vendedor');
    }
}
