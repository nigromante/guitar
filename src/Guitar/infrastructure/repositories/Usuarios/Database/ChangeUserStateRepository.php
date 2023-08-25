<?php 
namespace Domain\infrastructure\repositories\Usuarios\Database;

use Domain\infrastructure\repositories\DatabaseRepository;
use Domain\infrastructure\repositories\Usuarios\Interfaces\ChangeUserStateInterface;
use Domain\domain\entities\User;


class ChangeUserStateRepository extends DatabaseRepository implements ChangeUserStateInterface {
    
    public function execute( User $user, $newState ) :User {
        
        $sql = "UPDATE `usuarios` set enable={$newState}  WHERE id='{$user->getId()}' " ;
        mysqli_query($this->db, $sql);

        $sql = "SELECT * FROM `usuarios` where id='{$user->getId()}' ";
        $result = mysqli_query($this->db, $sql);
        $row = $result->fetch_assoc();
    
        if( ! $row ) return null;
    
        return new User( $row["id"] , $row["Nombre"], $row["Apellido"] , $row["Email"], $row["enable"], $row["createdat"] ) ;
    

    }

}


