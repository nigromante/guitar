<?php
$config = [];

$ENV_VARS = [
    'SERVER' => $_SERVER,
    'GET' => $_GET,
    'POST' => $_POST,
    'REQUEST' => $_REQUEST
];


require_once "database.php";
require_once "session.php";

// require_once "api.php" ;
require_once "web.php";
require_once "backend.php";
// require_once "test.php" ;
