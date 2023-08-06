<?php

namespace Domain\application\services\Usuarios;

use Domain\infrastructure\repositories\Usuarios\UsuarioRepository;
use Framework\crypt\CryptInterface;

class UserCheckLogin
{

    private UsuarioRepository $repository;
    private CryptInterface $crypt;

    public function __construct(UsuarioRepository $repository, CryptInterface $crypt )
    {
        $this->repository = $repository;
        $this->crypt = $crypt;
    }

    public function execute($email, $password)
    {
        $password = $this->crypt->encript( $password ) ;

        return $this->repository->UserCheckLogin($email, $password);
    }
}
