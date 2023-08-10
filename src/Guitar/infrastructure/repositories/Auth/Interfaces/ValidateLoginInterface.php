<?php

namespace Domain\infrastructure\repositories\Auth\Interfaces;

use Domain\application\services\Auth\ValidateLoginCommand;

interface  ValidateLoginInterface
{
    public function execute( ValidateLoginCommand $command ) : bool;
}
