<?php
namespace Domain\application\services\Auth;

use Domain\infrastructure\repositories\Auth\Interfaces\ValidateLoginInterface;

class ValidateLogin {

    private ValidateLoginInterface $repository ; 

    public function __construct( ValidateLoginInterface $repository ) 
    {
        $this->repository = $repository ;
    }

    public function execute( ValidateLoginCommand $command ) {
        return $this->repository->execute( $command );
    }
}
