<?php 

namespace Domain\infrastructure\repositories\Usuarios\Database;
use Domain\infrastructure\repositories\DatabaseRepository;
use Domain\infrastructure\repositories\Usuarios\Interfaces\CreateUserInterface;
use Domain\domain\entities\User;


class CreateUserRepository extends DatabaseRepository implements CreateUserInterface {
    
    public function execute( User $usuario ) {
        $sql = "INSERT INTO `usuarios` 
        ( `Nombre`, `Apellido`, `Email`, `password`, `createdat` , `enable` ) VALUES 
        (
            '{$usuario->getNombre()}', 
            '{$usuario->getApellido()}', 
            '{$usuario->getEmail()}', 
            '{$usuario->getPassword()}' , 
            now(), 
            1 
        )";
    mysqli_query($this->db, $sql);

    $insert_id = mysqli_insert_id( $this->db ) ; 

    $sql = "SELECT * FROM `usuarios` where id='{$insert_id}' ";
    $result = mysqli_query($this->db, $sql);
    $row = $result->fetch_assoc();

    if( ! $row ) return null;

    return new User( $row["id"] , $row["Nombre"], $row["Apellido"] , $row["Email"], $row["enable"], $row["createdat"] ) ;


    }

}
