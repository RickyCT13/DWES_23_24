<?php

/* 
    Función: generarTabla
    Descripción: genera una tabla de libros
    Parámetros: ninguno
    Salida:
        - Tabla libros
*/

function generarTabla() {
    $libros = [
        [
            'id' => 1,
            'titulo' => 'Rebelión en la granja',
            'autor' => 'George Orwell',
            'genero' => 'Sátira política',
            'precio' => 12.99
        ],
        [
            'id' => 2,
            'titulo' => 'Don Quijote de La Mancha',
            'autor' => 'Miguel de Cervantes',
            'genero' => 'Novela',
            'precio' => 15.25
        ],
        [
            'id' => 3,
            'titulo' => 'El cuarto de atrás',
            'autor' => 'Carmen Martín Gaite',
            'genero' => 'Novela',
            'precio' => 13.65
        ],
        [
            'id' => 4,
            'titulo' => 'El árbol de la ciencia',
            'autor' => 'Pío Baroja',
            'genero' => 'Novela autobiográfica',
            'precio' => 10.95
        ]
    ];
    return $libros;
}


/*


        Funciones: buscar_en_tabla()
        Descripción: Busca un valor en una determinada columna de una tabla
        Parámetros:
            - Tabla
            - Nombre Columna para hacer la búsqueda
            - Valor a buscar
        Salida: 
            - Tabla actualizada

*/
function buscarEnTabla($tabla = [], $columna, $valor) {
    $columna_valores = array_column((array) $tabla, $columna);
    return array_search($valor, $columna_valores, false);
}


/*

    funcion: eliminar()
    descripcion: elimina un elemento de la tabla
    parametros:
        - tabla
        - id del elemento que se desea eliminar
    salida:
        - tabla actualizada

*/

function eliminar(&$tabla = [], $idElemento) {
    // foreach ($tabla as $id => $registro) {
    //     if ($registro['id'] == $id_elemento) {
    //         unset($tabla[$id]);
    //     }
    // }
    $indice = array_search($idElemento, array_column($tabla, 'id'));
    unset($tabla[$indice]);
    $tabla = array_values($tabla);
    return $tabla;
}

/* 

    Función: ordenar()
    Descripción: Ordena los elementos de la tabla según uno de sus campos
    Parámetros:
        - Tabla
        - Criterio de ordenación
    Salida:
        - Tabla ordenada

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


/* 

    Función: actualizar()
    Descripción: Actualiza un registro de la tabla con los nuevos valores
    Parámetros:
        - Tabla
        - Nuevos valores del registro (null si no se desea cambiar)
        - Índice del registro que se desea actualizar
    Salida:
        - Tabla actualizada

*/
function actualizar(&$tabla = [], $valores = [], $indice) {
    $indice--;
    $campos = array_keys($tabla[0]);
    foreach (array_combine($campos, $valores) as $campo => $valor) {
        if ($valor !== null && isset($tabla[$indice][$campo])) {
            $tabla[$indice][$campo] = $valor;
        }
    }
    return $tabla;
}

/* 

    Función: nuevo()
    Descripción: Añade un nuevo registro a la tabla
    Parámetros:
        - Tabla
        - Valores del registro (si el 1er elemento, correspondiente al id, es nulo,
        se asignará el número de registros + 1)
    Salida:
        - Tabla actualizada

*/
function nuevo(&$tabla = [], $valores) {
    array_push($tabla, $valores);
    return $tabla;
}

/* 

    Función: filtrar()
    Descripción: Filtrar los registros de una tabla a partir de una expresión de búsqueda
    Parámetros:
        - Tabla
        - Expresión de búsqueda
    Salida:
        - Tabla filtrada

*/
function filtrar(&$tabla = [], $expresionBusqueda) {
    $tablaFiltrada = array_filter($tabla, function($registro) use ($expresionBusqueda) {
        return in_array($expresionBusqueda, $registro);
    });
    return $tablaFiltrada;
}

// $libros = generarTabla();

// Pruebas para el correcto funcionamiento:
// 
// echo "Tabla libros:\n";
// print_r($libros);

// echo "Eliminar el 4to ejemplar:\n";
// eliminar($libros, 4);

// print_r($libros);

// echo "Ordenar libros por autor:\n";
// $librosOrdenados = ordenar($libros, 'autor');

// print_r($librosOrdenados);

// echo "Actualizar el precio del primer ejemplar:\n";
// actualizar($libros, [null, null, null, null, 13.99], 1);

// print_r($libros);

// echo "Añadir un nuevo libro:\n";
// $libros = nuevo($libros, [null, "1984", "George Orwell", "Distopia", 15.95]);

// print_r($libros);

?>