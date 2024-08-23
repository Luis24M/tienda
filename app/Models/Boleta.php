<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boleta extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'fecha',
        'id_vendedor',
        'total',
    ];



    public function vendedor()
    {
        return $this->belongsTo(User::class, 'id_vendedor');
    }
}