<?php

/*
    Clase: ClassAlbum
    Contiene información de un álbum
*/

class ClassAlbum {
    public
    $id,
    $titulo,
    $descripcion,
    $autor,
    $fecha,
    $lugar,
    $categoria,
    $etiquetas,
    $num_fotos,
    $num_visitas,
    $carpeta;
    
    public function __construct(
        $id = null,
        $titulo = null,
        $descripcion = null,
        $autor = null,
        $fecha = null,
        $lugar = null,
        $categoria = null,
        $etiquetas = null,
        $num_fotos = null,
        $num_visitas = null,
        $carpeta = null
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->autor = $autor;
        $this->fecha = $fecha;
        $this->lugar = $lugar;
        $this->categoria = $categoria;
        $this->etiquetas = $etiquetas;
        $this->num_fotos = $num_fotos;
        $this->num_visitas = $num_visitas;
        $this->carpeta = $carpeta;
    }
}

?>