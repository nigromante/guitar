<?php

use Controllers\api\ApiHelpController;

use Framework\Router;

Router::Get('/api', [ApiHelpController::class, 'index']);

