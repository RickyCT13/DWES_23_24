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
            'categorias' => [0, 2, 3],
            'marca' => 4,
            'unidades' => 120,
            'precio' => 379.00
        ],
        [
            'id' => 2,
            'descripcion' => 'Portátil AMD A4-9125, 8 GB RAM, 125 GB',
            'modelo' => 'HP 255 G7, 15.6',
            'categorias' => [0, 2, 3],
            'marca' => 1,
            'unidades' => 200,
            'precio' => 205.50
        ],
        [
            'id' => 3,
            'descripcion' => 'PC sobremesa - Lenovo Intel® Core™ i3-8100',
            'modelo' => 'ideacentre 5105-07ICB',
            'categorias' => [1, 2, 3],
            'marca' => 10,
            'unidades' => 50,
            'precio' => 249.95
        ],
        [
            'id' => 4,
            'descripcion' => 'PC sobremesa - HP 290 APU AMD Dual-Core A6',
            'modelo' => 'HP 290-a0002ns',
            'categorias' => [1, 2, 3],
            'marca' => 3,
            'unidades' => 75,
            'precio' => 187.95
        ],
        [
            'id' => 5,
            'descripcion' => 'Monitor MSI Optix G24C4 23.6" LED FullHD 144Hz Freesync Curvo',
            'modelo' => 'Optix G24C4',
            'categorias' => [3],
            'marca' => 4,
            'unidades' => 152,
            'precio' => 139.00
        ],
        [
            'id' => 6,
            'descripcion' => 'Impresora Hp Deskjet 2720e Multifunción Color Wifi',
            'modelo' => 'Hp Deskjet 2720e',
            'categorias' => [4],
            'marca' => 3,
            'unidades' => 136,
            'precio' => 64.90
        ]
    ];
    return $articulos;
}

/**
 * Genera una tabla de categorías de artículos.
 * @return string[] La tabla de categorías creada.
 */
function generarTablaCategorias() {
    $categorias = [
        'Portátiles',
        'PCs sobremesa',
        'Componentes',
        'Pantallas',
        'Impresoras',
        'Tablets',
        'Móviles',
        'Fotografía',
        'Imagen'
    ];
    asort($categorias);
    return $categorias;
}

/**
 * Genera una tabla de marcas de artículos.
 * @return string[] La tabla de marcas creada.
 */
function generarTablaMarcas() {
    $marcas = [
        'Intel',
        'AMD',
        'Nvidia',
        'HP',
        'MSI',
        'Xiaomi',
        'Acer',
        'Aoc',
        'Nokia',
        'Apple',
        'Lenovo',
        'IBM'
    ];
    asort($marcas);
    return $marcas;
}

/**
 * Busca un valor en una columna de la tabla.
 * @param mixed $tabla La tabla con los registros.
 * @param string $columna El nombre de la columna en la que se busca el valor.
 * @param mixed $valor El valor que se desea encontrar.
 * @return mixed El índice del registro o del primer resultado, o false si no se encuentra.
 */
function buscarEnTabla($tabla, $columna, $valor) {
    $columna_valores = array_column($tabla, $columna);
    return array_search($valor, $columna_valores, false);
}

/**
 * Elimina un registro de la tabla.
 * @param mixed $tabla La tabla que contiene el registro.
 * @param int $idElemento El id del registro que se desea eliminar.
 * @return mixed El registro eliminado
 */
function eliminar(&$tabla, $idElemento) {
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
function actualizar(&$tabla, $idElemento, $valores) {
    $indice = array_search($idElemento, array_column($tabla, 'id'));
    $campos = array_keys($tabla[0]);
    array_unshift($valores, $idElemento);
    $tabla[$indice] = array_combine($campos, $valores);
}

/**
 * Añade un registro a la tabla.
 * @param mixed $tabla La tabla en la que se desea almacenar el registro.
 * @param mixed $valores Los valores del nuevo registro.
 */
function nuevo(&$tabla, $valores) {
    $campos = array_keys($tabla[0]);
    array_unshift($valores, (ultimoId($tabla) + 1));
    array_push($tabla, array_combine($campos, $valores));
}

/**
 * Ordena la tabla según distintos criterios de ordenación.
 * @param mixed $tabla La tabla con los registros.
 * @param string $criterio El criterio de ordenación.
 * @return mixed La tabla con los registros ordenados.
 */
function ordenar($tabla, $criterio) {
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
 * Devuelve los registros filtrados por una expresión de búsqueda.
 * @param mixed $tabla
 * @param mixed $expresionBusqueda
 * @return mixed Los registros de la tabla que en cualquiera de sus campos contengan el valor que se busca.
 */
function filtrar($tabla, $expresionBusqueda) {
    $tablaFiltrada = array_filter($tabla, function($registro) use ($expresionBusqueda) {
        return in_array($expresionBusqueda, $registro);
    });
    return $tablaFiltrada;
}

/**
 * Obtiene el último id de la tabla.
 * @param mixed $tabla La tabla que contiene los registros.
 * @return int El id del último registro de la tabla.
 */
function ultimoId($tabla) {
    $arrayId = array_column($tabla, 'id');
    asort($arrayId);
    return end($arrayId);
}

function mostrarCategorias($categorias, $categoriasArticulo) {
    $arrayCategorias = [];
    foreach($categoriasArticulo as $indice) {
        $arrayCategorias[] = $categorias[$indice];
    }
    asort($arrayCategorias);
    return($arrayCategorias);
}

/*$articulos = generarTablaArticulos();
$categorias = generarTablaCategorias();

print_r($articulos);

eliminar($articulos, 4);

print_r($articulos);

actualizar($articulos, 3, [3, "Artículo", "modelo", $categorias[0], 2, 2.99]);

print_r($articulos);*/
?>