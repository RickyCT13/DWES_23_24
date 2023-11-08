<?php

class ArrayArticulos {
    private $tabla;

    public function __construct() {
        $this->tabla = [];
    }

    public function getTabla() {
        return $this->tabla;
    }

    public function setTabla($tabla) {
        $this->tabla = $tabla;
    }

    public function crudCreate($nuevoArticulo) {
        $this->tabla[] = $nuevoArticulo;
    }

    public function crudRead($indice) {
        return $this->tabla[$indice];
    }

    public function crudUpdate($indice, $articuloModificado) {
        $this->tabla[$indice] = $articuloModificado;
    }

    public function crudDelete($indice) {
        unset($this->tabla[$indice]);
    }

    public function propiedadesObjeto($indice) {
        $articulo = $this->tabla[$indice];
        $propiedadesArticulo = [
            'id' => $articulo->getId(),
            'modelo' => $articulo->getModelo(),
            'descripcion' => $articulo->getDescripcion(),
            'marca' => $articulo->getMarca(),
            'categorias' => $articulo->getCategorias(),
            'unidades' => $articulo->getUnidades(),
            'precio' => $articulo->getPrecio()
        ];
        return $propiedadesArticulo;
    }

    public static function getDatos() {
        $tabla = [];
        $articulos = [
            new Articulo (
                1,
                'Portátil - HP 15-DB0074NS',
                'HP 15-DB0074NS',
                3,
                [0, 2, 3],
                120,
                379.00
            ),
            new Articulo (
                2,
                'Portátil AMD A4-9125, 8 GB RAM, 125 GB',
                'HP 255 G7, 15.6',
                1,
                [0, 2, 3],
                200,
                205.50
            ),
            new Articulo (
                4,
                'PC sobremesa - HP 290 APU AMD Dual-Core A6',
                'HP 290-a0002ns',
                3,
                [1, 2, 3],
                75,
                187.95
            ),
            new Articulo (
                5,
                'Monitor MSI Optix G24C4 23.6" LED FullHD 144Hz Freesync Curvo',
                'Optix G24C4',
                4,
                [3],
                152,
                139.00
            ),
            new Articulo (
                6,
                'Impresora Hp Deskjet 2720e Multifunción Color Wifi',
                'Hp Deskjet 2720e',
                3,
                [4],
                136,
                64.90
            )
        ];
        array_merge($tabla, $articulos);
        return $tabla;
    }

    public static function getTablaMarcas() {
        $tablaMarcas = [
            'Intel',
            'AMD',
            'Nvidia',
            'HP',
            'MSI',
            'Xiaomi',
            'Acer',
            'Aoc',
            'Nokia',
            'Apple',
            'Lenovo',
            'IBM'
        ];
        asort($tablaMarcas);
        return $tablaMarcas;
    }

    public static function getTablaCategorias() {
        $tablaCategorias = [
            'Portátiles',
            'PCs sobremesa',
            'Componentes',
            'Pantallas',
            'Impresoras',
            'Tablets',
            'Móviles',
            'Fotografía',
            'Imagen'
        ];
        asort($tablaCategorias);
        return $tablaCategorias;
    }

    public function mostrarCategorias($categorias, $indiceCategorias) {
        $aux = [];
        foreach($indiceCategorias as $indice) {
            $aux[] = $categorias[$indice];
        }
        asort($aux);
        return($aux);
    }
    
    
    function mostrarMarcas($marcas, $indiceMarca) {
        return $marcas[$indiceMarca];
    }
}
