<?php

namespace Domain\infrastructure\repositories\Usuarios\Interfaces;
use Domain\domain\entities\User;

interface  ChangeUserStateInterface
{

    public function execute( User $user, $newState ) : User ;
}