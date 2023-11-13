<?php

class ArrayArticulos {
    private $tabla;

    public function __construct() {
        $this->tabla = [];
    }
    public static function getMarcas() {
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

    public static function getCategorias() {
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

    public function generarId() {
        return (end($this->tabla)->getId()) + 1;
    }



    public function propiedadesObjeto($articulo) {
        $propiedadesArticulo = [
            $articulo->getId(),
            $articulo->getModelo(),
            $articulo->getDescripcion(),
            $articulo->getMarca(),
            $articulo->getCategorias(),
            $articulo->getUnidades(),
            $articulo->getPrecio()
        ];
        return $propiedadesArticulo;
    }

    public function getDatos() {
        $tabla = [];

        $articulo = new Articulo(
            1,
            'Portátil - HP 15-DB0074NS',
            'HP 15-DB0074NS',
            3,
            [0, 2, 3],
            120,
            379.00
        );

        $this->tabla[] = $articulo;

        $articulo = new Articulo(
            2,
            'Portátil AMD A4-9125, 8 GB RAM, 125 GB',
            'HP 255 G7, 15.6',
            1,
            [0, 2, 3],
            200,
            205.50
        );

        $this->tabla[] = $articulo;

        $articulo = new Articulo(
            3,
            'PC sobremesa - Lenovo Intel® Core™ i3-8100',
            'Ideacentre 5105-07ICB',
            10,
            [1, 2, 3],
            50,
            249.95
        );

        $this->tabla[] = $articulo;

        $articulo = new Articulo(
            4,
            'PC sobremesa - HP 290 APU AMD Dual-Core A6',
            'HP 290-a0002ns',
            3,
            [1, 2, 3],
            75,
            187.95
        );

        $this->tabla[] = $articulo;

        $articulo = new Articulo(
            5,
            'Monitor MSI Optix G24C4 23.6" LED FullHD 144Hz Freesync Curvo',
            'Optix G24C4',
            4,
            [3],
            152,
            139.00
        );

        $this->tabla[] = $articulo;

        $articulo = new Articulo(
            6,
            'Impresora Hp Deskjet 2720e Multifunción Color Wifi',
            'Hp Deskjet 2720e',
            3,
            [4],
            136,
            64.90
        );

        $this->tabla[] = $articulo;

        return $tabla;
    }

    public static function mostrarCategorias($categorias, $indiceCategorias) {
        $aux = [];
        foreach ($indiceCategorias as $indice) {
            $aux[] = $categorias[$indice];
        }
        asort($aux);
        return ($aux);
    }

    function mostrarMarcas($marcas, $indiceMarca) {
        return $marcas[$indiceMarca];
    }

    function ordenar($criterio) {
        $criterio = "get".ucFirst($criterio);
        usort($this->tabla, function($a, $b) use($criterio) {
            return $a->$criterio() <=> $b->$criterio();
        });
    }

    /*public function filtrar($expresionBusqueda) {
        $this->tabla = array_map(propiedadesObjeto(), $this->tabla);

        $tablaFiltrada = array_filter($this->tabla, function($registro) use ($expresionBusqueda) {
            foreach($registro as $campo) {
                if (strpos($campo, $expresionBusqueda) !== false) {
                    return true;
                }
            }
            return false;
        });

        $tablaFiltrada = array_map(function($registro) {
            return (object)$registro;
        }, $tablaFiltrada);
        return $tablaFiltrada;
    }*/
}
