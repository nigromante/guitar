<?php
require_once "../vendor/autoload.php";

date_default_timezone_set('America/Santiago');

require_once "../config/load.php";


require_once "../config/routes.php";

require_once "../utilities/framework_wrappers.php";


use Nigromante\Framework\Application;

use Nigromante\Framework\Session as SessionFinal;

SessionFinal::Start( $config ) ;

(new Application( $config ))
    ->run() ; 

