<?php

namespace App\Security\Application\UseCases;

use App\Security\Domain\Contracts\SecurityRepositoryInterface;
use App\Security\Infrastructure\Repositories\SecurityRepository;

class CheckUserRoleUseCase
{

    private SecurityRepositoryInterface $repositorio;

    public function __construct()
    {
        $this->repositorio = new SecurityRepository();
    }

    public function execute($userId, $role) 
    {
        $userRoles = $this->repositorio->findByIdOrFail($userId);
        return $userRoles->hasRole( $role );
    }
}
