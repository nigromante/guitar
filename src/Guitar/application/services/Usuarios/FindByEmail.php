<?php

namespace Domain\application\services\Usuarios;

use Domain\domain\entities\User;
use Domain\infrastructure\repositories\Usuarios\Interfaces\FindByEmailInterface;

class FindByEmail
{

    private FindByEmailInterface $repository;

    public function __construct(FindByEmailInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute($email) : User
    {
        return $this->repository->execute($email);
    }
}
