<?php
declare(strict_types=1);

namespace App\Auth\Domain\ValueObjects;


final class Password
{
    private string $password ;

    private function __construct(string $password = '')
    {
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


    public function equalTo(Password $anotherPassword): bool
    {
        return $this->password  ===  $anotherPassword->password ; 
    }

}
