<?php

class Vehiculo {
    public $marca;
    public $modelo;
    public $matricula;
    public $velocidad;
    public function __construct(
        $marca = null,
        $modelo = null,
        $matricula = null,
        $velocidad = null
    ) {

        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->matricula = $matricula;
        $this->velocidad = (float) $velocidad;
    }

    public function getMarca() {
        return $this->marca;
    }
    public function getModelo() {
        return $this->modelo;
    }
    public function getMatricula() {
        return $this->matricula;
    }
    public function getVelocidad() {
        return $this->velocidad;
    }
    public function setMarca($newMarca) {
        $this->marca = $newMarca;
    }
    public function setModelo($newModelo) {
        $this->modelo = $newModelo;
    }
    public function setMatricula($newMatricula) {
        $this->matricula = $newMatricula;
    }
    public function setVelocidad($newVelocidad) {
        $this->velocidad = (float) $newVelocidad;
    }
    public function aumentarVelocidad($incremento = null) {
        $this->velocidad += (float) $incremento;
    }
    public function disminuirVelocidad($decremento = null) {
        if ($this->velocidad >= $decremento) {
            $this->velocidad -= (float) $decremento;
        } 
    }
    public function parar() {
        $this->velocidad = 0;
    }
}
