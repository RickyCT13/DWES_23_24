<?php

class Deportivo extends Vehiculo {
    private $cilindrada;
    private $distRecorrida;

    public function __construct(
        $marca = null,
        $modelo = null,
        $matricula = null,
        $velocidad = null,
        $cilindrada = null,
        $distRecorrida = null
    ) {
        parent::__construct(
            $marca,
            $modelo,
            $matricula,
            $velocidad
        );
        $this->cilindrada = $cilindrada;
        $this->distRecorrida = $distRecorrida;
    }


}
