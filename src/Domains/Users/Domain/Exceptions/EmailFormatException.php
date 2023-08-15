<?php

namespace App\Users\Domain\Exceptions;


class EmailFormatException extends \Exception
{
    private const INVALID_EMAIL_FORMAT = 'Invalid email format [%s]';

    public static function Send($email)
    {
        return new self(sprintf(self::INVALID_EMAIL_FORMAT, $email));
    }

}
