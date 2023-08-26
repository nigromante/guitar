<?php
require_once "../vendor/autoload.php";

date_default_timezone_set('America/Santiago');

require_once "../config/load.php";

require_once "../framework/bootstrap.php";

require_once "../config/routes.php";



use Framework\Application;


(new Application( $config ))
    ->run() ; 

