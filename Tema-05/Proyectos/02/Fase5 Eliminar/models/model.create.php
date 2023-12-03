<?php

# Generar la tabla

setlocale(LC_MONETARY, "es_ES");

// Conexión con la base de datos
$db = new Fp();

// Cargar alumnos
$alumnos = $db->getAlumnos();

$cursos = $db->getCursos();

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$poblacion = $_POST['poblacion'];
$provincia = $_POST['provincia'];
$nacionalidad = $_POST['nacionalidad'];
$dni = $_POST['dni'];
$fechaNac = $_POST['fechaNac'];
$id_curso = $_POST['curso'];

$alumno = new Alumno();
$alumno->nombre = $nombre;
$alumno->apellidos = $apellidos;
$alumno->email = $email;
$alumno->telefono = $telefono;
$alumno->direccion = $direccion;
$alumno->poblacion = $poblacion;
$alumno->provincia = $provincia;
$alumno->nacionalidad = $nacionalidad;
$alumno->dni = $dni;
$alumno->fechaNac = $fechaNac;
$alumno->id_curso = $id_curso;

$db->insertAlumno($alumno);

$db = new Fp();

$alumnos = $db->getAlumnos();

$cursos = $db->getCursos();


?>