<?php

namespace App\Auth\Application\UseCases;

use App\Auth\Domain\Contracts\UserLoginSuccessInterface;
use App\Auth\Infrastructure\Repositories\UserLoginSuccessRepository;

class UserLoginSuccessUseCase
{

    private UserLoginSuccessInterface $repositorio;

    public function __construct()
    {
        $this->repositorio = new UserLoginSuccessRepository();
    }

    public function execute($email)
    {
        $this->repositorio->execute($email);
    }
}
