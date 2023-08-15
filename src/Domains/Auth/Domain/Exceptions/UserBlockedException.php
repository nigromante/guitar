<?php

namespace App\Auth\Domain\Exceptions;


class  UserBlockedException extends \Exception
{
    private const USER_BLOCKED = 'User blocked [%s]';

    public static function Send($email)
    {
        return new self(sprintf(self::USER_BLOCKED, $email));
    }

}
