<?php
namespace Domain\application\services\Usuarios;

use Domain\infrastructure\repositories\Usuarios\Interfaces\AllInterface;

class GetAllUsers {

    private AllInterface $repository ; 

    public function __construct( AllInterface $repository ) {
        $this->repository = $repository ; 
    }

    public function execute() {
        return $this->repository->execute() ;
    }
}
