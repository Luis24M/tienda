<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jerarquia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'valor',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
