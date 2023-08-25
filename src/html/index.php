<?php
require_once "../vendor/autoload.php";

date_default_timezone_set('America/Santiago');


require_once "../framework/bootstrap.php";


use Framework\Application;


(new Application())
    ->run() ; 

