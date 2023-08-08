<?php

use Framework\SessionManager;

function get_client_ip()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';

    return $ipaddress;
}

$IpCliente = get_client_ip();

date_default_timezone_set('America/Santiago');

$dbConfigSession = [
    'server' => $config['database']['DB_HOST'],
    'database' => $config['database']['DB_NAME'],
    'user' => $config['database']['DB_USER'],
    'password' => $config['database']['DB_PASS'] ,

    'ttl' => $config['session']['SESSION_TTL']
];

$handler_session = new SessionManager($dbConfigSession, $IpCliente);
session_set_save_handler(
    [$handler_session, 'open'],
    [$handler_session, 'close'],
    [$handler_session, 'read'],
    [$handler_session, 'write'],
    [$handler_session, 'destroy'],
    [$handler_session, 'gc']
);

session_name("GUITAR");
session_start();
session_gc(); 

// $_SESSION['user.name'] = "julian vidal"; 
