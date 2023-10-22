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

    funcion: eliminar()
    descripcion: elimina un elemento de la tabla
    parametros:
        - tabla
        - id del elemento que se desea eliminar
    salida:
        - tabla actualizada

*/

function eliminar(&$tabla = [], $id_elemento) {
    foreach ($tabla as $id => $registro) {
        if ($registro['id'] == $id_elemento) {
            unset($tabla[$id]);
        }
    }
    return $tabla;
}

function ordenar($tabla = [], $campo) {
    usort($tabla, function ($a, $b) use ($campo) {
        return $a[$campo] <=> $b[$campo];
    });
    return $tabla;
}

function actualizar(&$tabla = [], $valores = [], $indice) {
    foreach ($valores as $i => $valor) {
        if ($valor !== null && isset($tabla[$indice][$i])) {
            $tabla[$indice][$i] = $valor;
        }
    }
    return $tabla;
}

function nuevo(&$tabla = [], $valores) {
    $campos = array_keys($tabla[0]);
    $nuevoRegistro = array_combine($campos, $valores);
    array_push($tabla, $nuevoRegistro);
    return $tabla;
}

function filtrar(&$tabla = [], $expresionBusqueda) {
    $tablaFiltrada = array_filter($tabla, function($registro) use ($expresionBusqueda) {
        return in_array($expresionBusqueda, $registro);
    });
    return $tablaFiltrada;
}

$libros = generarTabla();

print_r($libros);

eliminar($libros, 4);

print_r($libros);

$librosOrdenados = ordenar($libros, $libros[0]['autor']);

print_r($librosOrdenados);

actualizar($libros, [null, null, null, null, 13.99], 0);

print_r($libros);

$libros = nuevo($libros, [5, "1984", "George Orwell", "Distopia", 15.95]);

print_r($libros);

?>