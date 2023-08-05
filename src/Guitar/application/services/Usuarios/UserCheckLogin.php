<?php

namespace Domain\application\services\Usuarios;

use Domain\infrastructure\repositories\Usuarios\UsuarioRepository;

class UserCheckLogin
{

    private UsuarioRepository $repository;

    public function __construct(UsuarioRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute($email, $password)
    {
        $password = \Framework\crypt\Crypt::encript( $password ) ;

        return $this->repository->UserCheckLogin($email, $password);
    }
}
