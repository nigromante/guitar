<?php

use Framework\Router;
use Controllers\test\FrontendController;


Router::Get('/xdebug', function () {
    return
        xdebug_info();
});



Router::Get('/test/frontend', [FrontendController::class, 'index']);
