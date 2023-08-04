<?php

namespace Domain\application\services\Usuarios;

use Domain\infrastructure\repositories\Usuarios\UsuarioRepository;

class FindByEmail
{

    private UsuarioRepository $repository;

    public function __construct(UsuarioRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute($email)
    {
        return $this->repository->FindByEmail($email);
    }
}
