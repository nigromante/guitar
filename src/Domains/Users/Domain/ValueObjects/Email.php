<?php
declare(strict_types=1);

namespace App\Users\Domain\ValueObjects;

use App\Users\Domain\Exceptions\EmailFormatException ; 

class Email
{
    private const EMAIL_REGEXP_PATTERN = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix" ;


    private string $email ;


    public static function init(...$args): self
    {
        return new static (...$args);
    }

    public function value() : string
    {
        return $this->email ;
    }


    public function equalTo(Email $email): bool
    {
        return $this->email  ===  $email->email ; 
    }

    protected function __construct(string $email = '')
    {
        if ( !empty($email) && ! $this->checkEmail($email) ) {
            throw EmailFormatException::Send($email);
        }

        $this->email = $email ;
    }

    private function checkEmail(string $email)
    {
        return (!preg_match( self::EMAIL_REGEXP_PATTERN , $email)) ? FALSE : TRUE;
    }

}
