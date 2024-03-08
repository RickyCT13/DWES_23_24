<?php  

/*
    En este archivo se cargan los recursos necesarios
*/

/*
    libs  (Librerías)
*/
require_once 'libs/database.php';
require_once 'libs/controller.php';
require_once 'libs/model.php';
require_once 'libs/view.php';
require_once 'libs/controlsession.php';
require_once 'libs/fpdf/fpdf.php';

require_once 'libs/app.php';

/*
    class (Clases)
*/
require_once 'class/class.cliente.php';
require_once 'class/class.cuenta.php';
require_once 'class/class.user.php';
require_once 'class/class.pdfClientes.php';
require_once 'class/class.pdfCuentas.php';
require_once 'class/class.contacto.php';

/*
    config (Ficheros de configuración)
*/
require_once 'config/config.php';
require_once 'config/privileges.php';

/*
    Se crea la instancia de la app
*/
$app = new App();


?>