<?php

namespace Domain\infrastructure\repositories\Usuarios\Interfaces;
use Domain\domain\entities\User;

interface  CreateUserInterface
{

    public function execute( User $user );
}