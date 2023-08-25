<?php
declare(strict_types=1);

namespace App\Security\Domain\Entities;
use App\Security\Domain\Exceptions\UserRoleException;

final class UserRoles
{
    private $userId;
    private $nombre ;
    private $roles ; 

    
    public function __construct( $userId, $nombre, $roles )
    {
        $this->userId = $userId;
        $this->nombre = $nombre;
        $this->roles = $roles;
    }

    public function hasRole( $resourceRole ) {

        if( ! in_array( $resourceRole , $this->roles ) ) {
            throw UserRoleException::Send( $this->userId , $this->nombre , $resourceRole );
        }
    }

    public function Roles() {
        return $this->roles ; 
    }

}