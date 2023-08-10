<?php 

namespace Domain\infrastructure\repositories\Usuarios\Database;
use Domain\infrastructure\repositories\DatabaseRepository;
use Domain\infrastructure\repositories\Usuarios\Interfaces\UpdateUserInterface;
use Domain\domain\entities\User;


class UpdateUserRepository extends DatabaseRepository implements UpdateUserInterface {
    
    public function execute( User $usuario ) {

        if( $usuario->getPassword() == '' ) {
            $sql = "UPDATE `usuarios` SET
            `Nombre` = '{$usuario->getNombre()}', 
            `Apellido` = '{$usuario->getApellido()}', 
            `Email` = '{$usuario->getEmail()}' 
            WHERE
            `id` = '{$usuario->getId()}'
            ";

        } else {
            $sql = "UPDATE `usuarios` SET
            `Nombre` = '{$usuario->getNombre()}', 
            `Apellido` = '{$usuario->getApellido()}', 
            `Email` = '{$usuario->getEmail()}', 
            `password` = '{$usuario->getPassword()}'
            WHERE
            `id` = '{$usuario->getId()}'
            ";

        }

        mysqli_query($this->db, $sql);


        $sql = "SELECT * FROM `usuarios` where id='{$usuario->getId()}' ";
        $result = mysqli_query($this->db, $sql);
        $row = $result->fetch_assoc();

        if( ! $row ) return null;

        return new User( $row["id"] , $row["Nombre"], $row["Apellido"] , $row["Email"], $row["enable"], $row["createdat"] ) ;


    }

}
