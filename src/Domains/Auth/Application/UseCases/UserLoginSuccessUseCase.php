<?php

namespace App\Auth\Application\UseCases;

use App\Auth\Domain\Contracts\AuthRepositoryInterface;
use App\Auth\Domain\ValueObjects\EmailRequired;
use App\Auth\Infrastructure\Repositories\AuthDatabaseRepository;

class UserLoginSuccessUseCase
{

    private AuthRepositoryInterface $repositorio ; 

    public function __construct()
    {
        $this->repositorio = new AuthDatabaseRepository();
    }

    public function execute($email)
    {
        $user = $this->repositorio->findByEmailOrFail( EmailRequired::init( $email ) ) ;

        $this->repositorio->userSuccessLogin( $user ) ;
    }
}
