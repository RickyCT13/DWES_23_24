<?php

/* 
    Función: generarTabla
    Descripción: genera una tabla de libros
    Parámetros: ninguno
    Salida:
        - Tabla libros
*/

function generarTabla()
{
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

function eliminar($tabla = [], $id_elemento)
{
    foreach ($tabla as $id => $registro) {
        if ($registro['id'] == $id_elemento) {
            unset($tabla[$id]);
        }
    }
    return $tabla;
}

function ordenar($tabla = [], $campo) {
    usort($tabla, function($a, $b) use ($campo) {
        return $a[$campo] <=> $b[$campo];
    });
    return $tabla;
}

function actuaizar($tabla = [], $valores = [], $indice) {
    
}

$libros = generarTabla();

foreach ($libros as $libro) {
    foreach ($libro as $campo) {
        echo $campo . "\n";
    }
    echo "\n";
}

eliminar($libros, 4);

foreach ($libros as $libro) {
    foreach ($libro as $campo) {
        echo $campo . "\n";
    }
    echo "\n";
}

?>