<?php
require_once "../vendor/autoload.php";

date_default_timezone_set('America/Santiago');
require_once "../config/load.php";
require_once "../config/routes.php";
require_once "../utilities/framework_wrappers.php";


Nigromante\Framework\Session::Start( $config ) ;

Utilities\CommandHandler::getInstance()->Configure( $config['commandhandlers'] ) ;


(new  Nigromante\Framework\Application( $config ))
    ->run() ; 

