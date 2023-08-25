<?php

namespace Controllers\backend;

use Nigromante\Guitar\Auth\Infrastructure\Configure\DomainEvents;

class Controller extends \Framework\Controller
{
    public function __construct() {
        DomainEvents::setup();
    }

}
