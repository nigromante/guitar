<?php

namespace Domain\infrastructure\repositories\Auth\Database;
use Domain\application\services\Auth\ValidateLoginCommand;
use Domain\infrastructure\repositories\Auth\Interfaces\ValidateLoginInterface;
use Domain\infrastructure\repositories\DatabaseRepository;

class ValidateLoginRepository  extends DatabaseRepository implements ValidateLoginInterface
{
    public function execute( ValidateLoginCommand $command ) : bool
    {
        if( $this->CheckUserPassword( $command )) {
            return $this->SuccessLogin( $command ) ; 

        }        
        return $this->ErrorLogin( $command ) ; 
    }

    private function CheckUserPassword( ValidateLoginCommand $command ) {
        $sql = "SELECT * FROM `usuarios` where enable=1 and `Email`='{$command->email}' and  `password`='{$command->password}' ";
        $result = mysqli_query($this->db, $sql);
        $row = $result->fetch_assoc();
        return($row == null) ; 
    }

    private function SuccessLogin( ValidateLoginCommand $command ) {
        $sql = "UPDATE `usuarios` set  
            `tries` = '0'  , 
            `lastlogin` = now()  
            where `Email` = '{$command->email}' ";
        mysqli_query($this->db, $sql);

        return true ; 
    }

    private function ErrorLogin( ValidateLoginCommand $command ) {
        $sql = "UPDATE `usuarios` set  
            `tries` = `tries` + 1  , 
            `enable` =  case when tries >= 3 then 0 else `enable` end 
            where `Email` = '{$command->email}' ";
        mysqli_query($this->db, $sql);

        return false ; 
}

}
