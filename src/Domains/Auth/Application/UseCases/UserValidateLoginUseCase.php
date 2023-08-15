<?php

namespace App\Auth\Application\UseCases;

use App\Auth\Domain\Contracts\AuthRepositoryInterface;
use App\Auth\Domain\ValueObjects\EmailRequired;
use App\Auth\Domain\ValueObjects\Password;
use App\Auth\Infrastructure\Repositories\AuthDatabaseRepository;

class UserValidateLoginUseCase
{
    private AuthRepositoryInterface $repositorio ; 

    public function __construct()
    {
        $this->repositorio = new AuthDatabaseRepository();
    }

    public function execute(UserValidateLoginCommand $command)
    {
        $user = $this->repositorio->findByEmailOrFail( EmailRequired::init( $command->email) ) ;

        return $user->ValidateLogin( Password::create($command->password) );
    }
}
