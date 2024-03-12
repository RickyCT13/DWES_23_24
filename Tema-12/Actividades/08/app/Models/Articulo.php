<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'categoria_id',
        'stock',
        'precio_coste',
        'precio_venta',
        'imagen'
    ];

    /*
        Establece la cardinalidad (1, m) entre articulos y categorías
        Un artículo puede pertenecer a varias categorías.
    */
    public function categorias() {
        return $this->belongsToMany('Categoria');
    }
}
