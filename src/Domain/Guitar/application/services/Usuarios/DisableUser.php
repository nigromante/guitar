<?php

namespace Domain\application\services\Usuarios;

use Domain\domain\entities\User;
use Domain\infrastructure\repositories\Usuarios\Interfaces\ChangeUserStateInterface;

class DisableUser
{

    private ChangeUserStateInterface $repository;

    public function __construct(ChangeUserStateInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute( User $user )
    {
        return $this->repository->execute($user , 0);
    }
}
