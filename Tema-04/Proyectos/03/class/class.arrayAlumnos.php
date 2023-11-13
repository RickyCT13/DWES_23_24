<?php

class ArrayAlumnos {
    private $tabla;
    public function __construct() {
        $this->tabla = [];
    }

    public static function getCursos() {
        $tablaCursos = [
            '1ºSMR',
            '2ºSMR',
            '1ºDAW',
            '2ºDAW',
            '1ºAD',
            '2ºAD'
        ];
        asort($tablaCursos);
        return $tablaCursos;
    }

    public static function getAsignaturas() {
        $tablaAsignaturas = [
            '1ºDAW Bases de Datos',
            '1ºDAW Entornos de Desarrollo',
            '1ºDAW Formación y Orientación Laboral',
            '1ºDAW Lenguajes de Marcas y sistemas de Gestión de la Información',
            '1ºDAW Programación',
            '1ºDAW Sistemas Informáticos',
            '2ºDAW Desarrollo Web en Entorno Servidor',
            '2ºDAW Desarrollo Web en Entorno Cliente',
            '2ºDAW Horas de Libre Configuración',
            '2ºDAW Diseño de Interfaces Web',
            '2ºDAW Despliegue de Aplicaciones Web',
            '2ºDAW Empresa e Iniciativa Emprendedora'
        ];
        asort($tablaAsignaturas);
        return $tablaAsignaturas;
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

    public function crudUpdate($indice, $alumnoModificado) {
        $this->tabla[$indice] = $alumnoModificado;
    }

    public function crudDelete($indice) {
        unset($this->tabla[$indice]);
    }

    public function generarId() {
        return (end($this->tabla)->getId()) + 1;
    }



    public function propiedadesObjeto($alumno) {
        $propiedadesArticulo = [
            $alumno->getId(),
            $alumno->getModelo(),
            $alumno->getDescripcion(),
            $alumno->getMarca(),
            $alumno->getAsignaturas(),
            $alumno->getUnidades(),
            $alumno->getPrecio()
        ];
        return $propiedadesArticulo;
    }

    public function getAlumnos() {
        $tabla = [];

        $alumno = new Alumno();

        $this->tabla[] = $alumno;

        $alumno = new Alumno(
            2,
            'Portátil AMD A4-9125, 8 GB RAM, 125 GB',
            'HP 255 G7, 15.6',
            1,
            [0, 2, 3],
            200,
            205.50
        );

        $this->tabla[] = $alumno;

        $alumno = new Alumno(
            3,
            'PC sobremesa - Lenovo Intel® Core™ i3-8100',
            'Ideacentre 5105-07ICB',
            10,
            [1, 2, 3],
            50,
            249.95
        );

        $this->tabla[] = $alumno;

        $alumno = new Alumno(
            4,
            'PC sobremesa - HP 290 APU AMD Dual-Core A6',
            'HP 290-a0002ns',
            3,
            [1, 2, 3],
            75,
            187.95
        );

        $this->tabla[] = $alumno;

        $alumno = new Alumno(
            5,
            'Monitor MSI Optix G24C4 23.6" LED FullHD 144Hz Freesync Curvo',
            'Optix G24C4',
            4,
            [3],
            152,
            139.00
        );

        $this->tabla[] = $alumno;

        $alumno = new Alumno(
            6,
            'Impresora Hp Deskjet 2720e Multifunción Color Wifi',
            'Hp Deskjet 2720e',
            3,
            [4],
            136,
            64.90
        );

        $this->tabla[] = $alumno;

        return $tabla;
    }

    public static function mostrarAsignaturas($asignaturas, $indiceAsignaturas) {
        $aux = [];
        foreach ($indiceAsignaturas as $indice) {
            $aux[] = $asignaturas[$indice];
        }
        asort($aux);
        return ($aux);
    }

    function mostrarCursos($cursos, $indiceCurso) {
        return $cursos[$indiceCurso];
    }

    function ordenar($criterio) {
        $criterio = "get" . ucFirst($criterio);
        usort($this->tabla, function ($a, $b) use ($criterio) {
            return $a->$criterio() <=> $b->$criterio();
        });
    }
}
