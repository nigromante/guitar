<?php

use Controllers\api\ApiHelpController;
use Controllers\api\RabbitController;

use Framework\Router;


Router::Get('/api', [ApiHelpController::class, 'index']);

Router::Get('/api/rabbit/send', [RabbitController::class, 'send']);
