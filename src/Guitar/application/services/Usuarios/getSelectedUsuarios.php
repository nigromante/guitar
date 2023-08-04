<?php

namespace Domain\application\services\Usuarios;

use Domain\infrastructure\repositories\Usuarios\UsuarioRepository;

class getSelectedUsuarios
{

    private UsuarioRepository $repository;

    public function __construct(UsuarioRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute()
    {
        return $this->repository->Selected();
    }
}
