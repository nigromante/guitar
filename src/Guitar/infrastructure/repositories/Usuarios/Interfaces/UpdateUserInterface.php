<?php

namespace Domain\infrastructure\repositories\Usuarios\Interfaces;
use Domain\domain\entities\User;

interface  UpdateUserInterface
{

    public function execute( User $user );
}