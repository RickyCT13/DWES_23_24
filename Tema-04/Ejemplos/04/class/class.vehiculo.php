<?php

class Vehiculo {

    public $marca;

    public $modelo;

    public $matricula;

    public $velocidad;

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

        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->matricula = $matricula;
        $this->velocidad = (float) $velocidad;
        $this->cilindrada = $cilindrada;
        $this->distRecorrida = $distRecorrida;
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

    public function getCilindrada() {
        return $this->cilindrada;
    }

    public function getDistRecorrida() {
        return $this->distRecorrida;
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

    public function setCilindrada($newCilindrada) {
        $this->cilindrada = (float) $newCilindrada;
    }

    public function setDistRecorrida($newDistRecorrida) {
        $this->distRecorrida = (float) $newDistRecorrida;
    }

    public function conducir($distancia = 0) {
        if ($distancia > 0) {
            $this->distRecorrida += (float) $distancia;
        }
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
