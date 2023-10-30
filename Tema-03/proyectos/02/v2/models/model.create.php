<?php 

# Generar la tabla

$articulos = generarTablaArticulos();
$categorias = generarTablaCategorias();

# Recibir por POST los datos
$descripcion = $_POST['descripcion'];
$modelo = $_POST['modelo'];
$categoriasArticulo = $_POST['categorias'];
$unidades = $_POST['unidades'];
$precio = $_POST['precio'];

$valoresNuevoArticulo = [
    $descripcion,
    $modelo,
    $categoriasArticulo,
    $unidades,
    $precio
];

print_r($valoresNuevoArticulo);
array_unshift($valoresNuevoArticulo, ultimoId($articulos));
echo "\n";
print_r($valoresNuevoArticulo);

nuevo($articulos, $valoresNuevoArticulo);

?>