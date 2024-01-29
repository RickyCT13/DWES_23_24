<?php

/*

    Ejemplo 01

    Creación de archivos

    */


//crear Archivo para escritura, si no existe lo crea

//Apertura de archivo
$fichero = "ejemplo.txt";
// Se añade el modificador b para evitar incompatibilidades
$fp = fopen($fichero, "wb");

//Escribir en el archivo
fwrite($fp, "Hola Mundo");

//Cierre de archivo
fclose($fp);


echo "Archivo Creado";
