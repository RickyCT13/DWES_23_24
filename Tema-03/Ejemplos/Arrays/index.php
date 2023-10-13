<?php
// Arrays escalares o indexados, donde el indice es un número desde el 0


// Forma tradicional de definir arrays
$miArray = array(0 => 1, 1 => 2, 2 => 3);

// Forma alternativa de definir arrays
$miArrayAlternativo = [
    1,
    2,
    3
];

// Las matrices son arrays multidimensionales o al revés
$miMatriz = array(
    0 => array(0 => 1, 1 => 2, 2 => 3),
    1 => array(0 => 4, 1 => 5, 2 => 6),
    2 => array(0 => 7, 1 => 8, 2 => 9)
);

// Se pueden definir también de la forma alternativa
$miMatrizAlternativa = [
    [
        1,
        2,
        3
    ],
    [
        4,
        5,
        6
    ],
    [
        7,
        8,
        9
    ]
];

// Forma de acceder a los arrays
// $array[x]
echo $miArray[1];
echo $miMatriz[0][2] . "\n";

// Recorrer arrays con for
for ($i = 0; $i <= 2; $i++) {
    echo $i;
    echo " => ";
    echo $miArray[$i];
    echo "<br>";
}

// Con count();
for ($i = 0; $i < count($miArray); $i++) {
    echo $i;
    echo " => ";
    echo $miArray[$i];
    echo "<br>";
}

// Con foreach (mejor)
foreach ($miArray as $valor) {
    echo $valor;
    echo "<br>";
}

// Recorrido de una matriz con foreach
foreach ($miMatriz as $valor) {
    foreach ($valor as $elemento) {
        echo $elemento;
        echo ", ";
    }
    ;
}

// Arrays Asociativos
$notas = array('Luis' => 6, 'Carmen' => 6, 'Manolo');

// En el caso de estos arrays, cada elemento obligatoriamente
// se define con la sintaxis clave => valor, incluso en la forma alternativa
$equipos = [
    [
        'id' => 1,
        'nombre' => 'Real Madrid',
        'ciudad' => 'Madrid'
    ],
    [
        'id' => 2,
        'nombre' => 'Real Betis',
        'ciudad' => 'Sevilla'
    ],
    [
        'id' => 3,
        'nombre' => 'FC Barcelona',
        'ciudad' => 'Barcelona'
    ]
];

?>