<?php

class Calculadora {
    private $valor1;

    private $valor2;

    private $operacion;

    private $resultado;

    public function __construct() {
        $this->valor1 = 0;
        $this->valor2 = 0;
        $this->operacion = null;
        $this->resultado = 0;
    }

    public function getValor1() {
        return $this->valor1;
    }

    public function getValor2() {
        return $this->valor2;
    }

    public function getOperacion() {
        return $this->operacion;
    }

    public function getResultado() {
        return $this->resultado;
    }

    public function setValor1($valor1) {
        $this->valor1 = $valor1;
    }

    public function setValor2($valor2) {
        $this->valor2 = $valor2;
    }

    public function setOperacion($operacion) {
        $this->operacion = $operacion;
    }

    public function setResultado($resultado) {
        $this->resultado = $resultado;
    }

    public function suma() {
        $this->operacion = "Suma";
        $this->resultado = $this->valor1 + $this->valor2;
    }

    public function resta() {
        $this->operacion = "Resta";
        $this->resultado = $this->valor1 - $this->valor2;
    }

    public function producto() {
        $this->operacion = "Producto";
        $this->resultado = $this->valor1 * $this->valor2;
    }

    public function division() {
        $this->operacion = "División";
        $this->resultado = $this->valor1 / $this->valor2;
    }

    public function potencia() {
        $this->operacion = "Potencia";
        $this->resultado = pow($this->valor1, $this->valor2);
    }

}

?>