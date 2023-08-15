<?php

namespace App\Users\Domain\Exceptions;


class UserNotFoundException extends \Exception
{
    private const USER_NOT_FOUND = 'User not found [%s]';

    public static function Send($email)
    {
        return new self(sprintf(self::USER_NOT_FOUND, $email));
    }

}
