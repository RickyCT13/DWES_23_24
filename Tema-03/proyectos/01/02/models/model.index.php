<?php

/** model.index.php
 * Definir y asignar valores a la matriz '$libros' de dos dimensiones con
 * índice principal escalar e índice secundario asociativo. Asignar al menos 4 entradas.
 * Campos de la tabla libros: id, titulo, autor, genero, precio.
*/

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

?>