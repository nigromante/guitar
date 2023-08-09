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
require_once "routes.php";

