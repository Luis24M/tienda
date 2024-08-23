<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'salario',
    ];

    public function boletas()
    {
        return $this->hasMany(Boleta::class);
    }
}
