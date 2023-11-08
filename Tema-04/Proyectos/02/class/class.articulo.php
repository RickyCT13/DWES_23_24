<?php

class Articulo {
    private $id;
    private $descripcion;
    private $modelo;
    private $marca;
    private $categorias;
    private $unidades;
    private $precio;

    public function __construct(
        $id = null,
        $descripcion = null,
        $modelo = null,
        $marca = null,
        $categorias = [],
        $unidades = null,
        $precio = null
    ) {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->modelo = $modelo;
        $this->marca = $marca;
        $this->categorias = $categorias;
        $this->unidades = $unidades;
        $this->precio = $precio;
    }

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getModelo(){
		return $this->modelo;
	}

	public function setModelo($modelo){
		$this->modelo = $modelo;
	}

	public function getMarca(){
		return $this->marca;
	}

	public function setMarca($marca){
		$this->marca = $marca;
	}

	public function getCategorias(){
		return $this->categorias;
	}

	public function setCategorias($categorias){
		$this->categorias = $categorias;
	}

	public function getUnidades(){
		return $this->unidades;
	}

	public function setUnidades($unidades){
		$this->unidades = $unidades;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function setPrecio($precio){
		$this->precio = $precio;
	}

}

?>