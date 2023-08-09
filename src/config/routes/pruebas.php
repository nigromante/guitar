<?php

use Framework\Router;
use Controllers\test\FrontendController;

Router::Get('/xdebug', function () {
    xdebug_info();

    return "";
});

Router::Get('/err', function () {
    return "error";
});

Router::Get('/phpinfo', function () {
    return 'phpinfo()';
});

Router::Get('/test/error', [FrontendController::class, 'error']);
Router::Get('/test/frontend', [FrontendController::class, 'index']);
