<?php

namespace App\Security\Domain\Exceptions;


class UserRoleException extends \Exception
{
    private const UNAUTHORIZED = 'User %s (%s) No autorizado a acceder al recurso [%s]  ';

    public static function Send( $userId, $userName , $resource)
    {
        return new self(sprintf(self::UNAUTHORIZED, $userName , $userId, $resource));
    }

}
