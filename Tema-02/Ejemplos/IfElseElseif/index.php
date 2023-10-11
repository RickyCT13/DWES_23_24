<?php
    # Sentencias alternativas: if else elseif
    echo "Hola mundo";
    $a = 5;
    $b = 6;

    if ($a > $b) {
        echo "A es mayor que B.";
    }
    elseif ($b > $a) {
        echo "B es mayor que A";
    }
    else {
        echo "Los dos números son iguales.";
    }
?>