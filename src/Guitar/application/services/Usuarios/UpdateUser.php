<?php
namespace Domain\application\services\Usuarios;

use Domain\domain\entities\User;
use Domain\infrastructure\repositories\Usuarios\Interfaces\UpdateUserInterface;

class UpdateUser {

    private UpdateUserInterface $repository ; 

    public function __construct( UpdateUserInterface $repository) {
        $this->repository = $repository ;
    }

    public function execute( User $user ) {

        return $this->repository->execute( $user );
    }
}
