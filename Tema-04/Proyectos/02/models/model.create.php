<?php 

# Generar la tabla

$categorias = ArrayArticulos::getCategorias();
$marcas = ArrayArticulos::getMarcas();
$articulos = new ArrayArticulos();
$articulos->getDatos();

# Recibir por POST los datos
$id = $articulos->generarId();
$descripcion = $_POST['descripcion'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$categoriasArticulo = $_POST['categorias'];
$unidades = $_POST['unidades'];
$precio = $_POST['precio'];

$nuevoArticulo = new Articulo($id, $descripcion, $modelo, $marca, $categoriasArticulo, $unidades, $precio);

$articulos->crudCreate($nuevoArticulo);

?>