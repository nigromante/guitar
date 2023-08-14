<?php

namespace App\Auth\Domain\ValueObjects;
use App\Auth\Domain\Exceptions\EmailRequiredException ; 


class EmailRequired extends Email
{
    protected function __construct(string $email = '')
    {
        if( empty($email ) )
            throw EmailRequiredException::Send();

        parent::__construct($email) ;
    }
}
