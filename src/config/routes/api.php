<?php
use Nigromante\Framework\Router ;

use Controllers\api\ApiHelpController;


Router::Get('/api', [ApiHelpController::class, 'index']);

