<?php

namespace Controllers\backend;

use App\Auth\Infrastructure\Configure\DomainEvents;

class Controller extends \Framework\Controller
{
    public function __construct() {
        DomainEvents::setup();
    }

}
