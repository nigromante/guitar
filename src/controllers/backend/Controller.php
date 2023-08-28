<?php
namespace Controllers\backend;

use Nigromante\Guitar\Auth\Infrastructure\Configure\DomainEvents;
use Nigromante\Framework\Controller as FrameworkController;


class Controller extends  FrameworkController
{
    public function __construct() {
        DomainEvents::setup();
    }

}
