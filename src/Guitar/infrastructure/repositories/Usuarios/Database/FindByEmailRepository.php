<?php 

namespace Domain\infrastructure\repositories\Usuarios\Database;
use Domain\infrastructure\repositories\DatabaseRepository;
use Domain\infrastructure\repositories\Usuarios\Interfaces\FindByEmailInterface;
use Domain\domain\entities\User;


class FindByEmailRepository extends DatabaseRepository implements FindByEmailInterface {
    
    public function execute( $email ) : User {
        $sql = "SELECT * FROM `usuarios` WHERE `Email`='{$email}' ";
        $result = mysqli_query($this->db, $sql);
        $row = $result->fetch_assoc();

        if( ! $row ) return null;

        return new User( $row["id"] , $row["Nombre"], $row["Apellido"] , $row["Email"], $row["enable"], $row["createdat"]  ) ;


    }

}


