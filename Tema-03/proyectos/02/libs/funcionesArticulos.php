<?php

/**
 * Genera una tabla con artículos informáticos (Una matriz con índice principal indexado e índice secundario asociativo).
 * @return mixed La tabla creada.
 */
function generarTablaArticulos() {
    $articulos = [
        [
            'id' => 1,
            'descripcion' => 'Portátil - HP 15-DB0074NS',
            'modelo' => 'HP 15-DB0074NS',
            'categoria' => 'Portátil',
            'unidades' => 120,
            'precio' => 379.00
        ],
        [
            'id' => 2,
            'descripcion' => 'Portátil AMD A4-9125, 8 GB RAM, 125 GB',
            'modelo' => 'HP 255 G7, 15.6',
            'categoria' => 'Portátil',
            'unidades' => 200,
            'precio' => 205.50
        ],
        [
            'id' => 3,
            'descripcion' => 'PC sobremesa - Lenovo Intel® Core™ i3-8100',
            'modelo' => 'ideacentre 5105-07ICB',
            'categoria' => 'PC sobremesa',
            'unidades' => 50,
            'precio' => 249.95
        ],
        [
            'id' => 4,
            'descripcion' => 'PC sobremesa - HP 290 APU AMD Dual-Core A6',
            'modelo' => 'HP 290-a0002ns',
            'categoria' => 'PC sobremesa',
            'unidades' => 75,
            'precio' => 187.95
        ],
    ];
    return $articulos;
}

/**
 * Genera una tabla de categorías de artículos.
 * @return string[] La tabla de categorías creada.
 */
function generarTablaCategorias() {
    $categorias = [
        "Portátil",
        "PC sobremesa",
        "Componente",
        "Pantalla",
        "Impresora"
    ];
    return $categorias;
}

/**
 * Elimina un registro de la tabla.
 * @param mixed $tabla La tabla que contiene el registro.
 * @param int $idElemento El id del registro que se desea eliminar.
 * @return mixed El registro eliminado
 */
function eliminar(&$tabla = [], $idElemento) {
    $indice = array_search($idElemento, array_column($tabla, 'id'));
    $registroEliminado = $tabla[$indice];
    unset($tabla[$indice]);
    $tabla = array_values($tabla);
    return $registroEliminado;
}

/**
 * Actualiza los valores de un registro en la tabla.
 * @param mixed $tabla La tabla que contiene el registro.
 * @param mixed $idElemento El id del elemento a actualizar.
 * @param mixed $valores Los nuevos valores del registro.
 */
function actualizar(&$tabla = [], $idElemento, $valores = []) {
    $indice = array_search($idElemento, array_column($tabla, 'id'));
    $campos = array_keys($tabla[0]);
    $tabla[$indice] = array_combine($campos, $valores);
}

/**
 * Añade un registro a la tabla.
 * @param mixed $tabla La tabla en la que se desea almacenar el registro.
 * @param mixed $valores Los valores del nuevo registro.
 */
function nuevo(&$tabla = [], $valores = []) {
    $campos = array_keys($tabla[0]);
    array_push($tabla, array_combine($campos, $valores));
}

/**
 * Ordena la tabla según distintos criterios de ordenación.
 * @param mixed $tabla La tabla con los registros.
 * @param string $criterio El criterio de ordenación.
 * @return mixed La tabla con los registros ordenados.
 */
function ordenar($tabla = [], $criterio) {
    $campos = array_keys($tabla[0]);
    foreach($campos as $campo) {
        if ($criterio === $campo) {
            usort($tabla, function ($a, $b) use ($campo) {
                return $a[$campo] <=> $b[$campo];
            });
        }
    }
    return $tabla;
}

/**
 * Obtiene el último id de la tabla.
 * @param mixed $tabla La tabla que contiene los registros.
 * @return int El id del último registro de la tabla.
 */
function ultimoId($tabla = []) {
    return $tabla[count($tabla) - 1]['id'];
}

$articulos = generarTablaArticulos();
$categorias = generarTablaCategorias();

print_r($articulos);

eliminar($articulos, 4);

print_r($articulos);

actualizar($articulos, 3, [3, "Artículo", "modelo", $categorias[0], 2, 2.99]);

print_r($articulos);
?>