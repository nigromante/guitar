<?php 
$config = [] ;

$ENV_VARS = [
    'SERVER' => $_SERVER , 
    'GET'=> $_GET , 
    'POST' => $_POST , 
    'REQUEST' => $_REQUEST
] ; 


require_once "database.php" ;
require_once "web.php" ;