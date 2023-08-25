<?php

namespace Domain\application\services\Usuarios;

use Domain\domain\entities\User;
use Domain\infrastructure\repositories\Usuarios\Interfaces\FindByIdInterface;

class FindById
{

    private FindByIdInterface $repository;

    public function __construct(FindByIdInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute($id) : User
    {
        return $this->repository->execute( $id ) ;
    }
}
