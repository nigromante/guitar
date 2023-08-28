<?php
require_once "../vendor/autoload.php";

date_default_timezone_set('America/Santiago');

require_once "../config/load.php";

//  require_once "../framework/bootstrap.php";

require_once "../config/routes.php";



use Nigromante\Framework\Application;

use Nigromante\Framework\Session as SessionFinal;

SessionFinal::Start( $config ) ;

(new Application( $config ))
    ->run() ; 

