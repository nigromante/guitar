<?php

namespace Domain\infrastructure\repositories\Auth\Memory;
use Domain\application\services\Auth\ValidateLoginCommand;
use Domain\infrastructure\repositories\Auth\Interfaces\ValidateLoginInterface;

class ValidateLoginRepository  implements ValidateLoginInterface
{
    public function execute( ValidateLoginCommand $command ) : bool
    {
        
        return false ; 
    }


}
