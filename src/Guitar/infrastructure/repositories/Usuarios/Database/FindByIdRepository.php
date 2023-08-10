<?php 

namespace Domain\infrastructure\repositories\Usuarios\Database;
use Domain\infrastructure\repositories\DatabaseRepository;
use Domain\infrastructure\repositories\Usuarios\Interfaces\FindByIdInterface;
use Domain\domain\entities\User;


class FindByIdRepository extends DatabaseRepository implements FindByIdInterface {
    
    public function execute( $id ) : User {
        $sql = "SELECT * FROM `usuarios` where id='{$id}' ";
        $result = mysqli_query($this->db, $sql);
        $row = $result->fetch_assoc();

        if( ! $row ) return null;

        return new User( $row["id"] , $row["Nombre"], $row["Apellido"] , $row["Email"], $row["enable"], $row["createdat"] ) ;


    }

}


