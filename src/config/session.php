<?php 

$config['session'] = [
    'DB_HOST' => getenv( "DB_HOST" ),
    'DB_NAME' => getenv( "DB_DATABASE" ),
    'DB_USER' => getenv( "DB_USER" ),
    'DB_PASS' => getenv( "DB_PASSWORD" ),

    'SESSION_TTL' => getenv( "SESSION_TTL" ),
    'SESSION_KEY' => getenv( "SESSION_KEY" )
];
