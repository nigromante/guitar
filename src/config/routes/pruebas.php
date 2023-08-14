<?php

use Framework\Router;
use Controllers\test\FrontendController;

use Predis\Client as PredisClient;


Router::Get('/xdebug', function () {
    xdebug_info();

    return "";
});

Router::Get('/err', function () {
    return "error";
});

Router::Get('/phpinfo', function () {
    return phpinfo();
});


Router::Get('/redis', function () {

    $client = new PredisClient( [
        'scheme' => 'tcp',
        'host'   => 'redis',
        'port'   => 6379,
    ]);


    $client->set('foo', 'bar');
    $value = $client->get('foo');
    echo "\n\nSALIDA : [" . $value . "] \n...\n\n";

    $client->set('nombre', 'julian');
    $value = $client->get('nombre');
    echo "\n\nSALIDA : [" . $value . "] \n...\n\n";

    $value = $client->get('foo');
    echo "\n\nSALIDA : [" . $value . "] \n...\n\n";
});

Router::Get('/test/error', [FrontendController::class, 'error']);
Router::Get('/test/frontend', [FrontendController::class, 'index']);
