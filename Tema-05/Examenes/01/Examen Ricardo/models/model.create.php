<?php

    /*
        Modelo create

        Recibe los valores del formulario nuevo libro
        hay que tener en cuenta que he dejado de utilizar algunos campos
    */

$db = new Libros();

$titulo = $_POST['titulo'];
$isbn = $_POST['isbn'];
$fecha_edicion = $_POST['fecha_edicion'];
$autor_id = $_POST['autor'];
$editorial_id = $_POST['editorial'];
$stock = $_POST['stock'];
$precio_coste = $_POST['precio_coste'];
$precio_venta = $_POST['precio_venta'];

$libro = new Libro(
    null,
    $isbn,
    null,
    $titulo,
    $autor_id,
    $editorial_id,
    $precio_coste,
    $precio_venta,
    $stock,
    null,
    null,
    $fecha_edicion
);

$db->crudCreate($libro);

$db = new Libros();

$libros = $db->getLibros();



?>