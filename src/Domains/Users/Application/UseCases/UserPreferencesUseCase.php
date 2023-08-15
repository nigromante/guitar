<?php

namespace App\Users\Application\UseCases;

use App\Users\Domain\Contracts\UserPreferencesRepositoryInterface;
use App\Users\Infrastructure\Repositories\UserPreferencesDatabaseRepository;
use App\Users\Domain\ValueObjects\EmailRequired;

class UserPreferencesUseCase
{

    private UserPreferencesRepositoryInterface $repositorio;
    
    public function __construct()
    {
        $this->repositorio = new UserPreferencesDatabaseRepository();
    }

    public function execute($email)
    {
        return $this->repositorio->findByEmailOrFail(EmailRequired::init($email));
    }
}
