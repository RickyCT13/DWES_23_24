<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'libs/database.php';
require_once 'libs/controller.php';
require_once 'libs/model.php';
require_once 'libs/view.php';
require_once 'class/class.corredor.php';

require_once 'libs/app.php';
require_once 'config/config.php';

$app = new App();

?>