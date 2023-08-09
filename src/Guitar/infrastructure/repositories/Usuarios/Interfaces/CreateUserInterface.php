<?php

namespace Domain\infrastructure\repositories\Usuarios\Interfaces;
use Domain\application\services\Usuarios\CreateUsuarioCommand;


interface  CreateUserInterface
{

    public function execute( CreateUsuarioCommand $user );
}