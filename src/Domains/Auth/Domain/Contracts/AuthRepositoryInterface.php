<?php
namespace App\Auth\Domain\Contracts;

use App\Auth\Domain\Entities\User;
use App\Auth\Domain\ValueObjects\EmailRequired;

interface AuthRepositoryInterface {

    public function findByEmailOrFail( EmailRequired $email) :User ;

    public function userSuccessLogin( User $user );

    public function userErrorLogin( User $user );

}