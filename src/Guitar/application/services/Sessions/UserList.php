<?php
namespace Domain\application\services\Sessions;

use Domain\infrastructure\repositories\Sessions\Interfaces\UsersSessionInterface;

class UserList {

    private UsersSessionInterface $repository ; 

    public function __construct( UsersSessionInterface $repository ) 
    {
        $this->repository = $repository ;
    }

    public function execute( ) {
        return $this->repository->execute();
    }
}
