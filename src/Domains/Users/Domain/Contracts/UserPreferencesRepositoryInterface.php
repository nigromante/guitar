<?php
namespace App\Users\Domain\Contracts;


use App\Users\Domain\Entities\User;
use App\Users\Domain\ValueObjects\EmailRequired;

interface UserPreferencesRepositoryInterface {

    public function findByEmailOrFail( EmailRequired $email) :User ;


}