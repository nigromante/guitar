<?php
namespace App\Security\Domain\Contracts;

use App\Security\Domain\Entities\UserRoles;

interface SecurityRepositoryInterface {

    public function findByIdOrFail( string $sessionId ) : UserRoles ;


}