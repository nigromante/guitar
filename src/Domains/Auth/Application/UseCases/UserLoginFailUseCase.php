<?php

namespace App\Auth\Application\UseCases;

use App\Auth\Domain\Contracts\UserLoginFailInterface;
use App\Auth\Infrastructure\Repositories\UserLoginFailRepository;

class UserLoginFailUseCase
{

    private UserLoginFailInterface $repositorio;

    public function __construct()
    {
        $this->repositorio = new UserLoginFailRepository();
    }

    public function execute($email)
    {
        $this->repositorio->execute($email);
    }
}
