<?php

/*
    
    Perfiles	 	Nuevo	Editar	Eliminar Mostrar Buscar Ordenar 
    ADMINISTRADOR	SI	    SI	    SI	     SI	     SI	    SI
    EDITOR	 	    SI	    SI	    NO	     SI	     SI	    SI 
    REGISTRADO	 	NO	    NO	    NO	     SI	     SI 	SI

    Definicion de priviegios
*/

/* Var    Recurso   Accion    
                 Sobre recurso*/
$_GLOBALS['alumno']['main'] = [1, 2, 3];
$_GLOBALS['alumno']['new'] = [1, 2];
$_GLOBALS['alumno']['edit'] = [1, 2];
$_GLOBALS['alumno']['delete'] = [1];
$_GLOBALS['alumno']['show'] = [1, 2, 3];
$_GLOBALS['alumno']['filter'] = [1, 2, 3];
$_GLOBALS['alumno']['order'] = [1, 2, 3];

?>