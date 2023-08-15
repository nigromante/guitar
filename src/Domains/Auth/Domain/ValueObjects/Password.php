<?php
declare(strict_types=1);

namespace App\Auth\Domain\ValueObjects;


final class Password
{
    private string $password ;

    private function __construct(string $password = '')
    {
        if( ! $this->ValidatePassword($password)) 
            throw new \Exception("Password insegura") ;

        $this->password = $password ;
    }

    public static function set($password): self
    {
        return new static ($password);
    }

    public static function create( $password ): self
    {
        return new static ( MD5($password));
    }

    private function ValidatePassword( $password ) {
        if( strlen( $password) < 3 )
            return false ; 

        return true ;
    }
    public function equalTo(Password $anotherPassword): bool
    {
        return $this->password  ===  $anotherPassword->password ; 
    }

}
