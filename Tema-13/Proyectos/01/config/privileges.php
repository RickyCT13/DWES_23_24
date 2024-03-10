<?php

    /*
        # Perfiles
        1 - Administrador
        2 - Editor
        3 - Registrado

        # Privilegios
        Perfiles	 	Nuevo	Editar	Eliminar	 Mostrar	Buscar 	Ordenar 
        ADMINISTRADOR	SI	    SI	    SI	         SI	        SI	    SI
        eDITOR	 	    SI	    SI	    NO	         SI	        SI	    SI 
        REGISTRADO	 	NO	    NO	    NO	         SI	        SI 	    SI


        # Definir privilegios como variables golbales

    */

    $GLOBALS['cliente']['main'] = [1, 2, 3];
    $GLOBALS['cliente']['new'] = [1, 2];
    $GLOBALS['cliente']['edit'] = [1, 2];
    $GLOBALS['cliente']['delete'] = [1];
    $GLOBALS['cliente']['show'] = [1, 2, 3];
    $GLOBALS['cliente']['filter'] = [1, 2, 3];
    $GLOBALS['cliente']['order'] = [1, 2, 3];
    $GLOBALS['cliente']['upload'] = [1, 2];
    $GLOBALS['cliente']['export'] = [1, 2, 3];
    $GLOBALS['cliente']['import'] = [1, 2];

    $GLOBALS['cuenta']['main'] = [1, 2, 3];
    $GLOBALS['cuenta']['new'] = [1, 2];
    $GLOBALS['cuenta']['edit'] = [1, 2];
    $GLOBALS['cuenta']['delete'] = [1];
    $GLOBALS['cuenta']['show'] = [1, 2, 3];
    $GLOBALS['cuenta']['filter'] = [1, 2, 3];
    $GLOBALS['cuenta']['order'] = [1, 2, 3];
    $GLOBALS['cuenta']['upload'] = [1, 2];
    $GLOBALS['cuenta']['export'] = [1, 2, 3];
    $GLOBALS['cuenta']['import'] = [1, 2];

    $GLOBALS['movimiento']['main'] = [1, 2, 3];
    $GLOBALS['movimiento']['new'] = [1, 2];
    $GLOBALS['movimiento']['edit'] = [1, 2];
    $GLOBALS['movimiento']['delete'] = [1];
    $GLOBALS['movimiento']['show'] = [1, 2, 3];
    $GLOBALS['movimiento']['filter'] = [1, 2, 3];
    $GLOBALS['movimiento']['order'] = [1, 2, 3];
    $GLOBALS['movimiento']['upload'] = [1, 2];
    $GLOBALS['movimiento']['export'] = [1, 2, 3];
    $GLOBALS['movimiento']['import'] = [1, 2];


