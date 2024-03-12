<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'categoria',
        'descripcion'
    ];

    /*
        Establece la cardinalidad (1, n) entre categorías y artículos
        Una categoría puede estar en / tener varios artículos.

        La relación entre artículos y categorías es varios a varios (M:N).
    */
    public function articulos() {
        return $this->hasMany('Articulo');
    }
}
