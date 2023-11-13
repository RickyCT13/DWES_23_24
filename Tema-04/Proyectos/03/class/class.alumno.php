<?php

class Alumno {
    public $id;
	public $nombre;
	public $apellidos;
	public $email;
	public $fechaNacimiento;
	public $curso;
	public $asignaturas;
	
	public function __construct(
		$id = null,
		$nombre = null,
		$apellidos = null,
		$email = null,
		$fechaNacimiento = null,
		$curso = null,
		$asignaturas = null
	) {
		$this->id = $id;
		$this->nombre = $nombre;
		$this->apellidos = $apellidos;
		$this->email = $email;
		$this->fechaNacimiento = $fechaNacimiento;
		$this->curso = $curso;
		$this->asignaturas = $asignaturas;

	}

	public function getEdad() {
		$fechaNacimiento = new DateTime($this->fechaNacimiento);
		$hoy = new DateTime();
		$edad = $hoy->diff($fechaNacimiento)->y;
		return $edad;
	}

}

?>