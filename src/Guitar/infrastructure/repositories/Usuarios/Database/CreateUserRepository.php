<?php 

namespace Domain\infrastructure\repositories\Usuarios\Database;
use Domain\infrastructure\repositories\DatabaseRepository;
use Domain\infrastructure\repositories\Usuarios\Interfaces\CreateUserInterface;
use Domain\application\services\Usuarios\CreateUsuarioCommand;


class CreateUserRepository extends DatabaseRepository implements CreateUserInterface {
    
    public function execute( CreateUsuarioCommand $usuarioCommand ) {
        $sql = "INSERT INTO `usuarios` 
        ( `Nombre`, `Apellido`, `Email`, `password`, `createdat` , `enable` ) VALUES 
        (
            '{$usuarioCommand->nombre}', 
            '{$usuarioCommand->apellido}', 
            '{$usuarioCommand->email}', 
            '{$usuarioCommand->password}' , 
            now(), 
            1 
        )";
    $result = mysqli_query($this->db, $sql);

    }

}
