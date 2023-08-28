<?php
$ENV_VARS = [
    'SERVER' => $_SERVER,
    'GET' => $_GET,
    'POST' => $_POST,
    'REQUEST' => $_REQUEST
];



$config = [];

require_once "database.php";
require_once "session.php";
require_once "commandhandlers.php" ; 

/*
echo "<br><br>";
echo ( json_encode( $ENV_VARS  )  ) ;
echo "<br><br>";
echo ( json_encode( $config )  ) ;
*/