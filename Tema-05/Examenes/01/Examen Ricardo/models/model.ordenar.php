<?php

   /*  
        model.ordenar.php

    */

$db = new Libros();

$criterio = $_GET['criterio'];

$libros = $db->order($criterio);
?>