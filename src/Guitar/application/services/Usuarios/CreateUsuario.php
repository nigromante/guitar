<?php
namespace Domain\application\services\Usuarios;
use Domain\domain\entities\User;
use Domain\infrastructure\repositories\Usuarios\Interfaces\CreateUserInterface;

class CreateUsuario {

    private CreateUserInterface $repository ; 

    public function __construct( CreateUserInterface $repository) {
        $this->repository = $repository ;
    }

    public function execute( User $data ) {
        return $this->repository->execute( $data );
    }
}
