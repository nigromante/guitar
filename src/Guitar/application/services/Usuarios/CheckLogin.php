<?php

namespace Domain\application\services\Usuarios;

use Domain\infrastructure\repositories\Usuarios\UsuarioRepository;

class CheckLogin
{

    private UsuarioRepository $repository;

    public function __construct(UsuarioRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute($email, $password)
    {
        return $this->repository->CheckLogin($email, $password);
    }
}
