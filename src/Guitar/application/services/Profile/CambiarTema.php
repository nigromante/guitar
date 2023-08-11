<?php

namespace Domain\application\services\Profile;

use Domain\infrastructure\repositories\Usuarios\Interfaces\CambiarTemaInterface;

class CambiarTema
{

    private CambiarTemaInterface $repository;

    public function __construct(CambiarTemaInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute( $mail, $tema )
    {
        return $this->repository->execute($mail, $tema);
    }
}
