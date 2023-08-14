<?php

namespace App\Auth\Application\UseCases;

use App\Auth\Domain\Contracts\FindUserInterface;
use App\Auth\Domain\ValueObjects\Password;
use App\Auth\Infrastructure\Repositories\FindUserDatabaseRepository;

class UserValidateLoginUseCase
{

    private FindUserInterface $repositorio;

    public function __construct()
    {
        $this->repositorio = new FindUserDatabaseRepository();
    }

    public function execute(UserValidateLoginCommand $command)
    {
        if (!($user = $this->repositorio->execute($command->email)))
            return false;

        return $user->ValidateLogin(Password::create($command->password));
    }
}
